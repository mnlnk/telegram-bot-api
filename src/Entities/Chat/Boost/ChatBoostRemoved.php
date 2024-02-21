<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\Sources\ChatBoostSource;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;

/**
 * Представляет буст, удаленный из чата.
 *
 * @link https://core.telegram.org/bots/api#chatboostremoved
 *
 * @method            Chat getChat()       Объект чата, к которому принадлежал удаленный буст.
 * @method          string getBoostId()    Уникальный идентификатор буста.
 * @method             int getRemoveDate() Момент времени (Unix), когда буст был удален.
 * @method ChatBoostSource getSource()     Объект источника удаленного буста.
 */
#[Required([
    'chat',
    'boost_id',
    'remove_date',
    'source'
])]
#[Depends([
    'chat' => Chat::class,
    'source' => ChatBoostSource::class
])]
class ChatBoostRemoved extends Entity implements UpdateContext
{
    //
}
