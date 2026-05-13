<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет собой живую фотографию.
 *
 * @link https://core.telegram.org/bots/api#livephoto
 *
 * @method  PhotoSize[] getPhoto()        (+) Доступные размеры соответствующего статическому фото.
 * @method       string getFileId()           Идентификатор видеофайла, который можно использовать для загрузки или повторного использования файла.
 * @method       string getFileUniqueId()     Уникальный идентификатор видеофайла, который должен оставаться неизменным с течением времени и для разных ботов.
 * @method          int getWidth()            Ширина видео, определенная отправителем.
 * @method          int getHeight()           Высота видео, определенная отправителем.
 * @method          int getDuration()         Длительность видео в секундах, определенная отправителем.
 * @method string |null getMimeType()     (+) MIME-тип файла, определенный отправителем.
 * @method     int|null getFileSize()     (+) Размер файла в байтах.
 *
 * @since 10.0
 */
#[Required([
    'file_id',
    'file_unique_id',
    'width',
    'height',
    'duration'
])]
#[Depends([
    'photo' => [PhotoSize::class]
])]
class LivePhoto extends Entity
{
    //
}
