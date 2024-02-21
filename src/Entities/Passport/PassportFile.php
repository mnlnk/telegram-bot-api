<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет файл, загруженный в Телеграм Паспорт.
 *
 * В настоящее время все файлы Телеграм Паспорт находятся в формате JPEG при расшифровке и не превышают 10 МБ.
 *
 * @link https://core.telegram.org/bots/api#passportfile
 *
 * @method string getFileId()       Идентификатор этого файла.
 * @method string getFileUniqueId() Уникальный идентификатор этого файла.
 * @method    int getFileSize()     Размер файла в байтах.
 * @method    int getFileDate()     Unix-время, когда файл был загружен.
 */
#[Required([
    'file_id',
    'file_unique_id',
    'file_size',
    'file_date'
])]
class PassportFile extends Entity
{
	//
}
