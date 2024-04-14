<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions\KeyboardButtonRequestUsers;

/**
 * Представляет информацию о пользователях, чьи идентификаторы были переданы боту с помощью кнопки {@link KeyboardButtonRequestUsers}.
 *
 * @link https://core.telegram.org/bots/api#usersshared
 *
 * @method          int getRequestId() Идентификатор запроса.
 * @method SharedUser[] getUsers()     Массив объектов пользователей, которые были переданы боту.
 */
#[Required([
    'request_id',
    'users'
])]
#[Depends([
    'users' => [SharedUser::class]
])]
class UsersShared extends Entity
{
    //
}
