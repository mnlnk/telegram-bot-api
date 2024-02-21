<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение о том, что пользователь бустит чат.
 *
 * @link https://core.telegram.org/bots/api#chatboostadded
 *
 * @method int getBoostCount() Количество бустов, добавленных пользователем.
 */
#[Required([
    'boost_count'
])]
class ChatBoostAdded extends Entity
{
    //
}
