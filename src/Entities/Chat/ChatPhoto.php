<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет фотографию чата.
 *
 * @link https://core.telegram.org/bots/api#chatphoto
 *
 * @method string getSmallFileId()       Идентификатор небольшого (160x160) файла фотографии чата. Можно использовать для загрузки фото.
 * @method string getSmallFileUniqueId() Уникальный идентификатор небольшого (160x160) файла фотографии чата.
 * @method string getBigFileId()         Идентификатор большого (640x640) файла фотографии чата. Можно использовать для загрузки фото.
 * @method string getBigFileUniqueId()   Уникальный идентификатор большого (640x640) файла фотографии чата.
 */
#[Required([
    'small_file_id',
    'small_file_unique_id',
    'big_file_id',
    'big_file_unique_id'
])]
class ChatPhoto extends Entity
{
	//
}
