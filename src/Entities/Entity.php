<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Exceptions\EntityException;
use Manuylenko\Telegram\Bot\Api\Exceptions\RequiredFieldsException;
use Manuylenko\Telegram\Bot\Api\Helpers\Utils;
use ReflectionAttribute;
use ReflectionClass;

/**
 * Представляет родительский класс сущностей.
 */
abstract class Entity
{
    /**
     * Массив сырых данных.
     */
    protected array $_data = [];


    #region Init

    /**
     * Конструктор.
     */
    public function __construct(array $data = [])
    {
        $this->checkRequired(array_keys($data));

        foreach ($data as $field => $value) {
            if ($value !== null) {
                $this->set($field, $value);
            }
        }
    }

    /**
     * Проверяет наличие обязательных полей.
     */
    protected function checkRequired(array $data): void
    {
        $attr = $this->getAttributes(Required::class);
        $fields = [];

        if (count($attr) > 0) {
            $list = $attr[0]->getArguments()[0];

            foreach ($list as $field) {
                if (!in_array($field, $data)) {
                    $fields[] = $field;
                }
            }
        }

        if (!empty($fields)) {
            throw new RequiredFieldsException(static::class,$fields);
        }
    }

    #endregion

    #region Attributes

    /**
     * Получает атрибуты текущего класса.
     *
     * @return ReflectionAttribute[]
     */
    protected function getAttributes(?string $name = null): array
    {
        return (new ReflectionClass($this))->getAttributes($name);
    }

    /**
     * Возвращает зависимость указанного поля.
     */
    protected function getDepend(string $field): array|string|null
    {
        $attr = $this->getAttributes(Depends::class);

        return count($attr) > 0 ? ($attr[0]->getArguments()[0][$field] ?? null) : null;
    }

    #endregion

    #region Fields

    /**
     * Устанавливает значение поля.
     */
    protected function set(string $field, Entity|array|string|int|float|bool $value): static
    {
        $this->_data[$field] = $value;

        return $this;
    }

    /**
     * Получает значение поля.
     */
    protected function get(string $field): Entity|array|string|int|float|bool|null
    {
        return $this->_data[$field] ?? null;
    }

    /**
     * Проверяет существование поля.
     */
    protected function has(string $field): bool
    {
        return isset($this->_data[$field]);
    }

    /**
     * Удаляет поле.
     */
    protected function remove(string $field): void
    {
        unset($this->_data[$field]);
    }

    #endregion

    #region Dynamic Access

    /**
     * Вызов сеттера поля.
     */
    private function setter(string $field, array $params, string $method): static
    {
        if (!isset($params[0])) {
            throw new EntityException(sprintf('Не указаны параметры метода %s::%s()', get_class($this), $method));
        }

        return $this->set($field, $params[0]);
    }

    /**
     * Вызов геттера поля.
     */
    private function getter(string $field): Entity|array|string|int|float|bool|null
    {
        $data = $this->get($field);

        if ($data === null) {
            return null;
        }

        if ($data instanceof Entity) {
            return $data;
        }

        $depend = $this->getDepend($field);

        if ($depend === null) {
            return $data;
        }

        $result = match (true) {
            !is_array($depend)    => EntityFactory::make($depend, $data),
            !is_array($depend[0]) => EntityFactory::makeArray($depend[0], $data),
            default               => EntityFactory::makeArrayOfArrays($depend[0][0], $data)
        };

        $this->set($field, $result);

        return $result;
    }

    /**
     * Динамический вызов геттеров и сеттеров.
     */
    public function __call(string $method, array $params): Entity|array|string|int|float|bool|null
    {
        $type = substr($method, 0, 3);
        $field = Utils::toSnakeCase(substr($method, 3));

        return match ($type) {
            'set'   => $this->setter($field, $params, $method),
            'get'   => $this->getter($field),
            default => null
        };
    }

    /**
     * Устанавливает значение поля через динамический вызов свойства класса.
     */
    public function __set(string $field, mixed $value): void
    {
        $this->setter($field, [$value], '__set');
    }

    /**
     * Получает значение поля через динамический вызов свойства класса.
     */
    public function __get(string $field): Entity|array|string|int|float|bool|null
    {
        return $this->getter($field);
    }

    #endregion

    #region Json

    /**
     * Упрощает значение.
     */
    protected function simplify(Entity|array|string|int|float|bool $data): array|string|int|float|bool
    {
        if ($data instanceof Entity) {
            $data = $data->_data;
        }

        if (is_array($data)) {
            foreach ($data as $field => $value) {
                $data[$field] = $this->simplify($value);
            }
        }

        return $data;
    }

    /**
     * Возвращает сущность в виде Json-строки.
     */
    public function toJson(): string
    {
        return json_encode($this->simplify($this->_data), JSON_THROW_ON_ERROR);
    }

    #endregion

    #region Static

    /**
     * Создает объект сущности из массива аргументов.
     */
    protected static function fromArgs(array $args, string $method = 'make'): static
    {
        return EntityFactory::make(static::class, Utils::getFuncArgs(static::class, $method, $args));
    }

    /**
     * Создает объект сущности из Json-строки.
     *
     * @return Entity
     */
    public static function fromJson(string $json): mixed
    {
        return EntityFactory::make(static::class, json_decode($json, true, 512, JSON_THROW_ON_ERROR));
    }

    #endregion
}
