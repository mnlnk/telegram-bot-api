<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет параметр кнопки встроенной клавиатуры, используемый для автоматической авторизации пользователя.
 *
 * Служит отличной заменой виджету входа в Телеграм, когда пользователь заходит из Телеграм.
 *
 * @link https://core.telegram.org/bots/api#loginurl
 *
 * @method      string getUrl()                    Url-адрес (Https) с данными авторизации пользователя, добавленными в строку запроса, который будет открыт при нажатии кнопки.
 * @method string|null getForwardText()        (+) Текст кнопки в пересылаемых сообщениях.
 * @method string|null getBotUsername()        (+) Логин бота, который будет использоваться для авторизации пользователя.
 * @method   bool|null getRequestWriteAccess() (+) Запросить у бота разрешение на отправку сообщений пользователю.
 *
 * @method $this setUrl(string $url)                             Url-адрес (Https) с данными авторизации пользователя, добавленными в строку запроса, который будет открыт при нажатии кнопки.
 * @method $this setForwardText(string $forwardText)             Текст кнопки в пересылаемых сообщениях.
 * @method $this setBotUsername(string $botUsername)             Логин бота, который будет использоваться для авторизации пользователя.
 * @method $this setRequestWriteAccess(bool $requestWriteAccess) Запросить у бота разрешение на отправку сообщений пользователю.
 */
#[Required([
    'url'
])]
class LoginUrl extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $url,
        ?string $forwardText,
        ?string $botUsername,
        ?bool $requestWriteAccess
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
