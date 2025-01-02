<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет список подарков.
 *
 * @link https://core.telegram.org/bots/api#gifts
 *
 * @method Gift[] getGifts() Массив объектов подарков.
 */
#[Required([
    'gifts'
])]
#[Depends([
    'gifts' => [Gift::class]
])]
class Gifts extends Entity
{
    //
}
