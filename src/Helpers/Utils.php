<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Helpers;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use ReflectionClass;

/**
 * Вспомогательный класс.
 */
class Utils
{
    /**
     * Конвертирует строку в змеиный регистр.
     */
    public static function toSnakeCase(string $str): string
    {
        return strtolower((ltrim(preg_replace('/[A-Z]/', '_$0', $str), '_')));
    }

    /**
     * Конвертирует данные в Json-строку.
     */
    public static function toJson(Entity|array|string|int|float|bool|null $data): string
    {
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $data[$k] = static::toJson($v);
            }

            $json = '['.implode(',', $data).']';
        } else {
            $json = $data instanceof Entity ? $data->toJson() : json_encode($data);
        }

        return $json;
    }

    /**
     * Получает массив параметров метода в виде именнованного массива.
     */
    public static function getFuncArgs(string $class, string $method, array $args): array
    {
        $ref = (new ReflectionClass($class))->getMethod($method)->getParameters();

        $params = [];
        $count = count($ref);

        for ($i = 0; $i < $count; $i++) {
            $n = static::toSnakeCase($ref[$i]->getName());

            $params[$n] = $args[$i] ?? $ref[$i]->getDefaultValue();

            if ($params[$n] === null) {
               unset($params[$n]);
            }
        }

        return $params;
    }
}
