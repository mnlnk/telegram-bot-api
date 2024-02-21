<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Members\ChatMember;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет изменения в статусе участника чата.
 *
 * @link https://core.telegram.org/bots/api#chatmemberupdated
 *
 * @method                Chat getChat()                        Объект чата, к которому относится пользователь.
 * @method                User getFrom()                        Объект пользователя (исполнителя действия), в результате которого произошло изменение.
 * @method                 int getDate()                        Дата внесения изменений (Unix).
 * @method          ChatMember getOldChatMember()               Старая информация об участнике чата.
 * @method          ChatMember getNewChatMember()               Новая информация об участнике чата.
 * @method ChatInviteLink|null getInviteLink()              (+) Объект ссылки-приглашения в чат, по которой пользователь присоединился к чату.
 * @method           bool|null getViaChatFolderInviteLink() (+) Пользователь присоединился к чату по ссылке-приглашению из папки чата.
 */
#[Required([
    'chat',
    'from',
    'date',
    'old_chat_member',
    'new_chat_member'
])]
#[Depends([
    'chat' => Chat::class,
    'from' => User::class,
    'old_chat_member' => ChatMember::class,
    'new_chat_member' => ChatMember::class,
    'invite_link' => ChatInviteLink::class
])]
class ChatMemberUpdated extends Entity implements UpdateContext
{
    //
}
