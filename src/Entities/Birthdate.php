<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет день рождения пользователя.
 *
 * @link https://core.telegram.org/bots/api#birthdate
 *
 * @method      int getDay()       День.
 * @method      int getMonth()     Месяц.
 * @method int|null getYear()  (+) Год.
 */
#[Required([
    'day',
    'month'
])]
class Birthdate extends Entity
{
    //
}
