<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts\Unique;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;

/**
 * Представляет модель уникального подарка.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftmodel
 *
 * @method      string getName()               Название модели.
 * @method     Sticker getSticker()            Объект стикера, представляющего уникальный подарок.
 * @method         int getRarityPerMille()     Количество уникальных подарков, которые получают эту модель, на каждые 1000 улучшенных подарков.
 * @method string|null getRarity()         (+) Редкость модели, если это модель, созданная вручную.
 */
#[Required([
    'name',
    'sticker',
    'rarity_per_mille'
])]
#[Depends([
    'sticker' => Sticker::class
])]
class UniqueGiftModel extends Entity
{
    /**
     * Необычный.
     */
    public function isUncommon(): bool
    {
        return $this->getRarity() == UniqueGiftRarity::UNCOMMON;
    }

    /**
     * Редкий.
     */
    public function isRare(): bool
    {
        return $this->getRarity() == UniqueGiftRarity::RARE;
    }

    /**
     * Эпический.
     */
    public function isEpic(): bool
    {
        return $this->getRarity() == UniqueGiftRarity::EPIC;
    }

    /**
     * Легендарный.
     */
    public function isLegendary(): bool
    {
        return $this->getRarity() == UniqueGiftRarity::LEGENDARY;
    }
}
