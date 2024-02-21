<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions\KeyboardButtonRequestUsers;

/**
 * Представляет информацию о пользователях, чьи идентификаторы были переданы боту с помощью кнопки {@link KeyboardButtonRequestUsers}.
 *
 * @link https://core.telegram.org/bots/api#usersshared
 *
 * @method   int getRequestId() Идентификатор запроса.
 * @method int[] getUserIds()   Идентификаторы пользователей.
 */
#[Required([
    'request_id',
    'user_ids'
])]
class UsersShared extends Entity
{
    //
}
