<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons;

/**
 * Представляет типы кнопок пользовательских клавиатур.
 *
 * @link https://core.telegram.org/bots/api#keyboardbutton
 */
abstract class KeyboardButtonType
{
    /**
     * Кнопка запроса пользователей.
     *
     * @var string
     */
    const REQUEST_USERS = 'request_users';

    /**
     * Кнопка запроса чата.
     *
     * @var string
     */
    const REQUEST_CHAT = 'request_chat';

    /**
     * Кнопка запроса телефонного контакта пользователя.
     *
     * @var string
     */
    const REQUEST_CONTACT = 'request_contact';

    /**
     * Кнопка запроса текущего местоположения пользователя.
     *
     * @var string
     */
    const REQUEST_LOCATION = 'request_location';

    /**
     * Кнопка с предложением создать опрос.
     *
     * @var string
     */
    const REQUEST_POLL = 'request_poll';

    /**
     * Кнопка запуска веб-приложения.
     *
     * @var string
     */
    const WEB_APP = 'web_app';

    # # #

    /**
     * Типы кнопок пользовательских клавиатур.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::REQUEST_USERS,
            static::REQUEST_CHAT,
            static::REQUEST_CONTACT,
            static::REQUEST_LOCATION,
            static::REQUEST_POLL,
            static::WEB_APP
        ];
    }
}
