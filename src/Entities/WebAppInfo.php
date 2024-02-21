<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет веб-приложение.
 *
 * @link https://core.telegram.org/bots/api#webappinfo
 *
 * @method string getUrl() Url-адрес Https веб-приложения.
 *
 * @method $this setUrl(string $url) Url-адрес Https веб-приложения.
 */
#[Required([
    'url'
])]
class WebAppInfo extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $url
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
