<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет видеофайл.
 *
 * @link https://core.telegram.org/bots/api#video
 *
 * @method           string getFileId()           Идентификатор файла.
 * @method           string getFileUniqueId()     Уникальный идентификатор файла.
 * @method              int getWidth()            Ширина видео, определяемая отправителем
 * @method              int getHeight()           Высота видео, определяемая отправителем.
 * @method              int getDuration()         Продолжительность видео в секундах, определяемая отправителем.
 * @method   PhotoSize|null getThumbnail()    (+) Объект миниатюры (превью) видео.
 * @method PhotoSize[]|null getCover()        (+) Массив объектов доступных размеров обложки видео.
 * @method      string|null getFileName()     (+) Оригинальное имя файла, определяемое отправителем.
 * @method      string|null getMimeType()     (+) MIME-тип файла, определяемый отправителем.
 * @method         int|null getFileSize()     (+) Размер файла в байтах.
 */
#[Required([
    'file_id',
    'file_unique_id',
    'width',
    'height',
    'duration'
])]
#[Depends([
    'thumbnail' => PhotoSize::class,
    'cover' => [PhotoSize::class]
])]
class Video extends Entity
{
    //
}
