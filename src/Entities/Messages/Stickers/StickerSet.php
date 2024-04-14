<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет набор стикеров.
 *
 * @link https://core.telegram.org/bots/api#stickerset
 *
 * @method         string getName()            Имя набора стикеров.
 * @method         string getTitle()           Название набора стикеров.
 * @method         string getStickerType()     Тип стикеров в наборе.
 * @method      Sticker[] getStickers()        Массив объектов всех стикеров этого набора.
 * @method PhotoSize|null getThumbnail()   (+) Объект миниатюры (превью) набора стикеров.
 */
#[Required([
    'name',
    'title',
    'sticker_type',
    'is_animated',
    'is_video',
    'stickers'
])]
#[Depends([
    'stickers' => [Sticker::class],
    'thumbnail' => PhotoSize::class
])]
class StickerSet extends Entity
{
    /**
     * Набор обычных стикеров.
     */
    public function isRegular(): bool
    {
        return $this->getStickerType() === StickerType::REGULAR;
    }

    /**
     * Набор масок.
     */
    public function isMask(): bool
    {
        return $this->getStickerType() === StickerType::MASK;
    }

    /**
     * Набор пользовательских эмоджи стикеров.
     */
    public function isCustomEmoji(): bool
    {
        return $this->getStickerType() === StickerType::CUSTOM_EMOJI;
    }
}
