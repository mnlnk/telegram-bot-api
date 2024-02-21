<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет файл, готовый к загрузке.
 *
 * Гарантируется, что ссылка будет действительна не менее 1 часа.
 * Когда срок действия ссылки истекает, можно запросить новую, вызвав {@link Api::getFile()}.
 *
 * @link https://core.telegram.org/bots/api#file
 *
 * @method      string getFileId()           Идентификатор файла
 * @method      string getFileUniqueId()     Уникальный идентификатор файла.
 * @method string|null getFileSize()     (+) Размер файла в байтах.
 * @method string|null getFilePath()     (+) Путь к файлу. Используйте https://api.telegram.org/file/bot<token>/<file_path>, чтобы получить файл.
 */
#[Required([
    'file_id',
    'file_unique_id'
])]
class File extends Entity
{
    //
}
