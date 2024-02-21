<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;

/**
 * Представляет изменения реакции на сообщение с анонимными реакциями.
 *
 * @link https://core.telegram.org/bots/api#messagereactioncountupdated
 *
 * @method            Chat getChat()      Объект чата, содержащего сообщение.
 * @method             int getMessageId() Уникальный идентификатор сообщения внутри чата.
 * @method             int getDate()      Дата изменения (Unix-время).
 * @method ReactionCount[] getReactions() Массив объектов реакций, присутствующих у сообщения.
 */
#[Required([
    'chat',
    'message_id',
    'date',
    'reactions'
])]
#[Depends([
    'chat' => Chat::class,
    'reactions' => [ReactionCount::class]
])]
class MessageReactionCountUpdated extends Entity implements UpdateContext
{
    //
}
