<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

/**
 * Представляет типы чатов.
 *
 * @link https://core.telegram.org/bots/api#chat
 */
abstract class ChatType
{
    /**
     * Приватный чат (личная переписка).
     *
     * @var string
     */
    const PRIVATE = 'private';

    /**
     * Группа.
     *
     * @var string
     */
    const GROUP = 'group';

    /**
     * Супергруппа.
     *
     * @var string
     */
    const SUPERGROUP = 'supergroup';

    /**
     * Канал.
     *
     * @var string
     */
    const CHANNEL = 'channel';

    # # #

    /**
     * Типы чатов.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::PRIVATE,
            static::GROUP,
            static::SUPERGROUP,
            static::CHANNEL
        ];
    }
}
