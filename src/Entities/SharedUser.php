<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет информацию о пользователе, доступ к которой был предоставлен боту с помощью кнопки KeyboardButtonRequestUser
 *
 * @link https://core.telegram.org/bots/api#shareduser
 *
 * @method              int getUserId()        Идентификатор пользователя.
 * @method      string|null getFirstName() (+) Имя пользователя, если было запрошено ботом.
 * @method      string|null getLastName()  (+) Фамилия пользователя, если была запрошено ботом.
 * @method      string|null getUsername()  (+) Юзернейм пользователя, если был запрошен ботом.
 * @method PhotoSize[]|null getPhoto()     (+) Массив объектов фото, если фото было запрошено ботом.
 */
#[Required([
    'user_id'
])]
#[Depends([
    'photo' => [PhotoSize::class]
])]
class SharedUser extends Entity
{
    //
}
