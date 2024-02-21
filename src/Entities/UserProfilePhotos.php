<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет изображения профиля пользователя.
 *
 * @link https://core.telegram.org/bots/api#userprofilephotos
 *
 * @method     int getTotalCount() Общее количество изображений профиля пользователя.
 * @method array[] getPhotos()     Массив массивов объектов запрошенных изображений профиля (каждое до 4 размеров).
 */
#[Required([
    'total_count',
    'photos'
])]
#[Depends([
    'photos' => [[PhotoSize::class]]
])]
class UserProfilePhotos extends Entity
{
    //
}
