<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\WebAppInfo;

/**
 * Представляет кнопку, которая будет отображаться над результатами встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultsbutton
 *
 * @method     string getText()               Текст кнопки.
 * @method WebAppInfo getWebApp()         (+) Объект с описанием веб-приложения, которое будет запускаться при нажатии пользователем кнопки.
 * @method     string getStartParameter() (+) Параметр глубокой ссылки для сообщения /start, отправляемого боту, когда пользователь нажимает кнопку.
 *
 * @method $this setText(string $text)                     Текст кнопки.
 * @method $this setWebApp(WebAppInfo $webApp)             Объект с описанием веб-приложения, которое будет запускаться при нажатии пользователем кнопки.
 * @method $this setStartParameter(string $startParameter) Параметр глубокой ссылки для сообщения /start, отправляемого боту, когда пользователь нажимает кнопку.
 */
#[Required([
    'text'
])]
#[Depends([
    'web_app' => WebAppInfo::class
])]
class InlineQueryResultsButton extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $text,
        ?WebAppInfo $webApp = null,
        ?string $startParameter = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
