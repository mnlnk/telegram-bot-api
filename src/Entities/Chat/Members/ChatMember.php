<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Members;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет участника чата.
 *
 * @link https://core.telegram.org/bots/api#chatmember
 *
 * @see ChatMemberAdministrator
 * @see ChatMemberBanned
 * @see ChatMemberLeft
 * @see ChatMemberMember
 * @see ChatMemberOwner
 * @see ChatMemberRestricted
 */
#[Concrete]
abstract class ChatMember extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['status']) {
            ChatMemberStatus::CREATOR       => new ChatMemberOwner($data),
            ChatMemberStatus::ADMINISTRATOR => new ChatMemberAdministrator($data),
            ChatMemberStatus::MEMBER        => new ChatMemberMember($data),
            ChatMemberStatus::RESTRICTED    => new ChatMemberRestricted($data),
            ChatMemberStatus::LEFT          => new ChatMemberLeft($data),
            ChatMemberStatus::KICKED        => new ChatMemberBanned($data),
            default                         => null
        };
    }
}
