<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет видео-сообщение.
 *
 * @link https://core.telegram.org/bots/api#videonote
 *
 * @method         string getFileId()           Идентификатор файла.
 * @method         string getFileUniqueId()     Уникальный идентификатор файла.
 * @method            int getLength()           Ширина и высота видео (диаметр видео-сообщения), определяемые отправителем.
 * @method            int getDuration()         Продолжительность видео в секундах, определяемая отправителем.
 * @method PhotoSize|null getThumbnail()    (+) Объект миниатюры (превью) видео.
 * @method       int|null getFileSize()     (+) Размер файла в байтах.
 */
#[Required([
    'file_id',
    'file_unique_id',
    'length',
    'duration'
])]
#[Depends([
    'thumbnail' => PhotoSize::class
])]
class VideoNote extends Entity
{
    //
}
