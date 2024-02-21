<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\File;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет стикер.
 *
 * @link https://core.telegram.org/bots/api#sticker
 *
 * @method            string getFileId()               Идентификатор файла.
 * @method            string getFileUniqueId()         Уникальный идентификатор файла.
 * @method            string getType()                 Тип стикера.
 * @method               int getWidth()                Ширина стикера.
 * @method               int getHeight()               Высота стикера.
 * @method              bool getIsAnimated()           Анимированый стикер.
 * @method              bool getIsVideo()              Видео-стикер.
 * @method    PhotoSize|null getThumbnail()        (+) Объект миниатюры (превью) стикера.
 * @method       string|null getEmoji()            (+) Эмоджи, связанный со стикером.
 * @method       string|null getSetName()          (+) Название набора стикеров, к которому относится стикер.
 * @method         File|null getPremiumAnimation() (+) Объект файла премиальной анимации; для премиальных стикеров.
 * @method MaskPosition|null getMaskPosition()     (+) Объект положения маски стикера.
 * @method       string|null getCustomEmojiId()    (+) Уникальный идентификатор пользовательского эмоджи для пользовательских стикеров с эмоджи.
 * @method         bool|null getNeedsRepainting()  (+) Необходима перекраска в цвет текста в сообщениях, цвет эмоджи иконки в статусе, белый цвет на фотографиях в чате или другой подходящий цвет в других местах.
 * @method          int|null getFileSize()         (+) Размер файла в байтах.
 */
#[Required([
    'file_id',
    'file_unique_id',
    'type',
    'width',
    'height',
    'is_animated',
    'is_video'
])]
#[Depends([
    'thumbnail' => PhotoSize::class,
    'premium_animation' => File::class,
    'mask_position' => MaskPosition::class
])]
class Sticker extends Entity
{
    /**
     * Обычный стикер.
     */
    public function isRegular(): bool
    {
        return $this->getType() === StickerType::REGULAR;
    }

    /**
     * Маска.
     */
    public function isMask(): bool
    {
        return $this->getType() === StickerType::MASK;
    }

    /**
     * Пользовательский эмоджи-стикер.
     */
    public function isCustomEmoji(): bool
    {
        return $this->getType() === StickerType::CUSTOM_EMOJI;
    }
}
