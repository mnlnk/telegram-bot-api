<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет файл анимации (видео GIF или H.264/MPEG-4 AVC без звука).
 *
 * @link https://core.telegram.org/bots/api#animation
 *
 * @method         string getFileId()           Идентификатор этого файла.
 * @method         string getFileUniqueId()     Уникальный идентификатор этого файла.
 * @method            int getWidth()            Ширина видео, определяемая отправителем.
 * @method            int getHeight()           Высота видео, определяемая отправителем.
 * @method            int getDuration()         Продолжительность анимации в секундах, определяемая отправителем.
 * @method PhotoSize|null getThumbnail()    (+) Объект миниатюры анимации, определяемой отправителем.
 * @method    string|null getFileName()     (+) Исходное имя файла анимации, определяемое отправителем.
 * @method    string|null getMimeType()     (+) MIME-тип файла, определяемый отправителем.
 * @method       int|null getFileSize()     (+) Размер файла в байтах.
 */
#[Required([
    'file_id',
    'file_unique_id',
    'width',
    'height',
    'duration'
])]
#[Depends([
    'thumbnail' => PhotoSize::class
])]
class Animation extends Entity
{
    //
}
