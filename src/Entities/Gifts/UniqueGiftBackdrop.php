<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Описывает предысторию уникального подарка.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftbackdrop
 *
 * @method                   string getName()           Название фона.
 * @method UniqueGiftBackdropColors getColors()         Объект с описанием цветов фона.
 * @method                      int getRarityPerMille() Количество уникальных подарков, которые получают этот фон, на каждые 1000 улучшенных подарков.
 */
#[Required([
    'name',
    'colors',
    'rarity_per_mille'
])]
#[Depends([
    'colors' => UniqueGiftBackdropColors::class
])]
class UniqueGiftBackdrop extends Entity
{
    //
}
