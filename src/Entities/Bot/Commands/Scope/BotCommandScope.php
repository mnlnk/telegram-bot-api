<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\Scope;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет область применения команд бота.
 *
 * @link https://core.telegram.org/bots/api#botcommandscope
 *
 * @see BotCommandScopeDefault
 * @see BotCommandScopeAllPrivateChats
 * @see BotCommandScopeAllGroupChats
 * @see BotCommandScopeAllChatAdministrators
 * @see BotCommandScopeChat
 * @see BotCommandScopeChatAdministrators
 * @see BotCommandScopeChatMember
 */
#[Concrete]
abstract class BotCommandScope extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            BotCommandScopeType::DEFAULT                 => new BotCommandScopeDefault($data),
            BotCommandScopeType::ALL_PRIVATE_CHATS       => new BotCommandScopeAllPrivateChats($data),
            BotCommandScopeType::ALL_GROUP_CHATS         => new BotCommandScopeAllGroupChats($data),
            BotCommandScopeType::ALL_CHAT_ADMINISTRATORS => new BotCommandScopeAllChatAdministrators($data),
            BotCommandScopeType::CHAT                    => new BotCommandScopeChat($data),
            BotCommandScopeType::CHAT_ADMINISTRATORS     => new BotCommandScopeChatAdministrators($data),
            BotCommandScopeType::CHAT_MEMBER             => new BotCommandScopeChatMember($data),
            default                                      => null
        };
    }
}
