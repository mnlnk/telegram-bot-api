<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет собой информацию об определенном качестве видеофайла.
 *
 * @link https://core.telegram.org/bots/api#videoquality
 *
 * @method   string getFileId()           Идентификатор этого файла, который можно использовать для его загрузки или повторного использования.
 * @method   string getFileUniqueId()     Уникальный идентификатор для этого файла.
 * @method      int getWidth()            Ширина.
 * @method      int getHeight()           Высота.
 * @method   string getCodec()            Кодек, использованный для кодирования видео, например, "h264", "h265" или "av01".
 * @method int|null getFileSize()     (+) Размер файла (в байтах).
 *
 * @since 9.4
 */
#[Required([
    'file_id',
    'file_unique_id',
    'width',
    'height',
    'codec',
])]
class VideoQuality extends Entity
{
    //
}
