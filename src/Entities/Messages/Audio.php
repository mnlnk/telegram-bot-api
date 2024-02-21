<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет аудио-файл, который клиенты Телеграм будут рассматривать как музыку.
 *
 * @link https://core.telegram.org/bots/api#audio
 *
 * @method         string getFileId()           Идентификатор файла.
 * @method         string getFileUniqueId()     Уникальный идентификатор файла.
 * @method            int getDuration()         Продолжительность звука в секундах, определяемая отправителем.
 * @method    string|null getPerformer()    (+) Исполнитель аудио, определяемый отправителем или аудио-тегами.
 * @method    string|null getTitle()        (+) Название аудио, определяемое отправителем или аудио-тегами.
 * @method    string|null getFileName()     (+) Оригинальное имя файла, определяемое отправителем.
 * @method    string|null getMimeType()     (+) MIME-тип файла, определяемый отправителем.
 * @method       int|null getFileSize()     (+) Размер файла в байтах.
 * @method PhotoSize|null getThumbnail()    (+) Объект миниатюры обложки альбома, которому принадлежит музыкальный файл.
 */
#[Required([
    'file_id',
    'file_unique_id',
    'duration'
])]
#[Depends([
    'thumbnail' => PhotoSize::class
])]
class Audio extends Entity
{
    //
}
