<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет простой файл (в отличие от фотографий, голосовых сообщений и аудиофайлов).
 *
 * @link https://core.telegram.org/bots/api#document
 *
 * @method         string getFileId()           Идентификатор файла.
 * @method         string getFileUniqueId()     Уникальный идентификатор файла.
 * @method PhotoSize|null getThumbnail()    (+) Объект миниатюры документа, определяемый отправителем.
 * @method    string|null getFileName()     (+) Оригинальное имя файла, определяемое отправителем.
 * @method    string|null getMimeType()     (+) MIME-тип файла, определяемый отправителем.
 * @method       int|null getFileSize()     (+) Размер файла в байтах.
 */
#[Required([
    'file_id',
    'file_unique_id'
])]
#[Depends([
    'thumbnail' => PhotoSize::class
])]
class Document extends Entity
{
    //
}
