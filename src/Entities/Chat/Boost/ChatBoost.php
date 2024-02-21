<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\Sources\ChatBoostSource;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет информацию о бусте чата.
 *
 * @link https://core.telegram.org/bots/api#chatboost
 *
 * @method          string getBoostId()        Уникальный идентификатор буста.
 * @method             int getAddDate()        Момент времени (Unix), когда был добавлен буст в чат.
 * @method             int getExpirationDate() Момент времени (Unix), когда истекает срок действия буста, если премиум подписка бустера не будет продлена.
 * @method ChatBoostSource getSource()         Объект источника добавленого буста.
 */
#[Required([
    'boost_id',
    'add_date',
    'expiration_date',
    'source'
])]
#[Depends([
    'source' => ChatBoostSource::class
])]
class ChatBoost extends Entity
{
    //
}
