<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет запрос на вступление в чат.
 *
 * @link https://core.telegram.org/bots/api#chatjoinrequest
 *
 * @method                Chat getChat()           Объект чата, в который был отправлен запрос.
 * @method                User getFrom()           Объект пользователя, отправившего запрос на вступление.
 * @method                 int getUserChatId()     Идентификатор приватного чата с пользователем, отправившего запрос на вступление.
 * @method                 int getDate()           Дата отправки запроса (Unix).
 * @method         string|null getBio()        (+) Информация о пользователе.
 * @method ChatInviteLink|null getInviteLink() (+) Объект ссылки-приглашения, которая использовалась пользователем для отправки запроса на вступление.
 */
#[Required([
    'chat',
    'from',
    'user_chat_id',
    'date'
])]
#[Depends([
    'chat' => Chat::class,
    'from' => User::class,
    'invite_link' => ChatInviteLink::class
])]
class ChatJoinRequest extends Entity implements UpdateContext
{
    //
}
