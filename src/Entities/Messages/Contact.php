<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет телефонный контакт.
 *
 * @link https://core.telegram.org/bots/api#contact
 *
 * @method      string getPhoneNumber()     Телефонный номер.
 * @method      string getFirstName()       Имя.
 * @method string|null getLastName()    (+) Фамилия.
 * @method    int|null getUserId()      (+) Идентификатор пользователя в Телеграм.
 * @method string|null getVcard()       (+) Дополнительные данные в виде vCard.
 *
 * @see https://en.wikipedia.org/wiki/VCard
 */
#[Required([
    'phone_number',
    'first_name'
])]
class Contact extends Entity
{
    //
}
