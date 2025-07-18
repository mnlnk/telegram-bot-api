<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет задник уникального подарка.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftbackdrop
 *
 * @method                   string getName()           Название задника.
 * @method UniqueGiftBackdropColors getColors()         Объект с описанием цветов задник.
 * @method                      int getRarityPerMille() Количество уникальных подарков, которые получают этот задник, на каждые 1000 улучшенных подарков.
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
