<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;

/**
 * Представляет символ, изображенный на образце уникального подарка.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftsymbol
 *
 * @method  string getName()           Название символа.
 * @method Sticker getSticker()        Объект стикера, представляющего уникальный подарок.
 * @method     int getRarityPerMille() Количество уникальных подарков, которые получают этот символ, на каждые 1000 улучшенных подарков.
 */
#[Required([
    'name',
    'sticker',
    'rarity_per_mille'
])]
#[Depends([
    'sticker' => Sticker::class
])]
class UniqueGiftSymbol extends Entity
{
    //
}
