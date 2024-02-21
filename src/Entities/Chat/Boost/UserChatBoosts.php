<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет буст, добавленный в чат пользователем.
 *
 * @link https://core.telegram.org/bots/api#userchatboosts
 *
 * @method ChatBoost[] getBoosts() Массив объектов бустов, добавленных в чат пользователем.
 */
#[Required([
    'boosts'
])]
#[Depends([
    'boosts' => [ChatBoost::class]
])]
class UserChatBoosts extends Entity
{
    //
}
