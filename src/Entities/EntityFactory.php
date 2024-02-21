<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use ReflectionClass;

/**
 * Фабрика сущностей.
 */
abstract class EntityFactory
{
    /**
     * Проверяет наличие конкретной сущности.
     */
    public static function hasConcrete(string $class): bool
    {
        return count((new ReflectionClass($class))->getAttributes(Concrete::class)) > 0;
    }

    # # #

    /**
     * Создает объект сущности.
     *
     * @return Entity
     */
    public static function make(string $class, array $data): mixed
    {
        return static::hasConcrete($class) ? $class::getConcrete($data) : new $class($data);
    }

    /**
     * Создает массив объектов сущностей.
     *
     * @return Entity[]
     */
    public static function makeArray(string $class, array $data): array
    {
        $a = [];

        foreach ($data as $d) {
            $a[] = static::make($class, $d);
        }

        return $a;
    }

    /**
     * Создает массив массивов объектов сущностей.
     *
     * @return Entity[][]
     */
    public static function makeArrayOfArrays(string $class, array $data): array
    {
        $a = [];

        foreach ($data as $d) {
            $a[] = static::makeArray($class, $d);
        }

        return $a;
    }

    # # #

    /**
     * Создает объект сущности из Json-строки.
     *
     * @return Entity
     */
    public static function makeFromJson(string $class, string $json): mixed
    {
        return static::make($class, json_decode($json, true));
    }
}
