<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет заднего фона уникального подарка.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftbackdrop
 *
 * @method                   string getName()           Название заднего фона.
 * @method UniqueGiftBackdropColors getColors()         Объект с описанием цветов заднего фона.
 * @method                      int getRarityPerMille() Количество уникальных подарков, которые получают этот заднний фон, на каждые 1000 улучшенных подарков.
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
