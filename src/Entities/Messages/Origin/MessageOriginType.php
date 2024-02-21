<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin;

/**
 * Представляет типы происхождения сообщения.
 *
 * @link https://core.telegram.org/bots/api#messageorigin
 */
abstract class MessageOriginType
{
    /**
     * Сообщение было отправлено известным пользователем.
     *
     * @var string
     */
    const USER = 'user';

    /**
     * Сообщение было отправлено неизвестным пользователем.
     *
     * @var string
     */
    const HIDDEN_USER = 'hidden_user';

    /**
     * Сообщение было отправлено от имени чата в групповой чат.
     *
     * @var string
     */
    const CHAT = 'chat';

    /**
     * Сообщение было отправлено в чат канала.
     *
     * @var string
     */
    const CHANNEL = 'channel';

    # # #

    /**
     * Типы происхождения сообщения.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::USER,
            static::HIDDEN_USER,
            static::CHAT,
            static::CHANNEL
        ];
    }
}
