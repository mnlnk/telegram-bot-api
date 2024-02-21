<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет фотографию или миниатюру файла/стикера одного размера.
 *
 * @link https://core.telegram.org/bots/api#photosize
 *
 * @method   string getFileId()           Идентификатор файла.
 * @method   string getFileUniqueId()     Уникальный идентификатор файла.
 * @method      int getWidth()            Ширина фото.
 * @method      int getHeight()           Высота фото.
 * @method int|null getFileSize()     (+) Размер файла в байтах.
 */
#[Required([
    'file_id',
    'file_unique_id',
    'width',
    'height'
])]
class PhotoSize extends Entity
{
    //
}
