<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;

/**
 * Представляет подарок.
 *
 * @link https://core.telegram.org/bots/api#gift
 *
 * @method   string getId()                   Уникальный идентификатор подарка.
 * @method  Sticker getSticker()              Объект стикера, символизирующий подарок.
 * @method      int getStarCount()            Количество Telegram Stars, которое необходимо заплатить для отправки стикера.
 * @method int|null getUpgradeStarCount() (+) Количество Telegram Stars, которое необходимо заплатить, чтобы сделать подарок уникальным.
 * @method int|null getTotalCount()       (+) Общее количество подарков данного типа, которое можно отправить; только для ограниченных подарков.
 * @method int|null getRemainingCount()   (+) Количество оставшихся подарков данного типа, которые можно отправить; только для ограниченных подарков.
 */
#[Required([
    'id',
    'sticker',
    'star_count'
])]
#[Depends([
    'sticker' => Sticker::class
])]
class Gift extends Entity
{
    //
}
