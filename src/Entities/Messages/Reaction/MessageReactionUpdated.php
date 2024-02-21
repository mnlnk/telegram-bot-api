<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types\ReactionType;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет изменение реакции пользователя на сообщении.
 *
 * @link https://core.telegram.org/bots/api#messagereactionupdated
 *
 * @method           Chat getChat()            Объект чата, содержащего сообщение.
 * @method            int getMessageId()       Уникальный идентификатор сообщения внутри чата.
 * @method      User|null getUser()        (+) Объект пользователя, изменившего реакцию, если пользователь не анонимен.
 * @method      Chat|null getActorChat()   (+) Объект чата, от имени которого была изменена реакция, если пользователь анонимный.
 * @method            int getDate()            Дата изменения (Unix-время).
 * @method ReactionType[] getOldReaction()     Массив объектов старых реакций.
 * @method ReactionType[] getNewReaction()     Массив объектов новых реакций.
 */
#[Required([
    'chat',
    'message_id',
    'date',
    'old_reaction',
    'new_reaction'
])]
#[Depends([
    'chat' => Chat::class,
    'user' => User::class,
    'actor_chat' => Chat::class,
    'old_reaction' => [ReactionType::class],
    'new_reaction' => [ReactionType::class]
])]
class MessageReactionUpdated extends Entity implements UpdateContext
{
    //
}
