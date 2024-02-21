<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет голосовую заметку.
 *
 * @link https://core.telegram.org/bots/api#voice
 *
 * @method      string getFileId()           Идентификатор файла.
 * @method      string getFileUniqueId()     Уникальный идентификатор файла.
 * @method         int getDuration()         Продолжительность звука в секундах, определяемая отправителем.
 * @method string|null getMimeType()     (+) MIME-тип файла, определяемый отправителем.
 * @method    int|null getFileSize()     (+) Размер файла в байтах.
 */
#[Required([
    'file_id',
    'file_unique_id',
    'duration'
])]
class Voice extends Entity
{
	//
}
