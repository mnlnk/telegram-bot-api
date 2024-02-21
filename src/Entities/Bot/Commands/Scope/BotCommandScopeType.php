<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\Scope;

/**
 * Представляет типы областей, к которым применяются команды бота.
 *
 * @link https://core.telegram.org/bots/api#botcommandscope
 */
abstract class BotCommandScopeType
{
    /**
     * По умолчанию.
     *
     * @var string
     */
    const DEFAULT = 'default';

    /**
     * Все приватные чаты.
     *
     * @var string
     */
    const ALL_PRIVATE_CHATS = 'all_private_chats';

    /**
     * Все групповые чаты.
     *
     * @var string
     */
    const ALL_GROUP_CHATS = 'all_group_chats';

    /**
     * Все администраторы групп и супергрупп.
     *
     * @var string
     */
    const ALL_CHAT_ADMINISTRATORS = 'all_chat_administrators';

    /**
     * Определенный чат.
     *
     * @var string
     */
    const CHAT = 'chat';

    /**
     * Все администраторы определенной группы или супергруппы.
     *
     * @var string
     */
    const CHAT_ADMINISTRATORS = 'chat_administrators';

    /**
     * Определенный участник группы или супергруппы.
     *
     * @var string
     */
    const CHAT_MEMBER = 'chat_member';

    # # #

    /**
     * Типы областей.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::DEFAULT,
            static::ALL_PRIVATE_CHATS,
            static::ALL_GROUP_CHATS,
            static::ALL_CHAT_ADMINISTRATORS,
            static::CHAT,
            static::CHAT_ADMINISTRATORS,
            static::CHAT_MEMBER
        ];
    }
}
