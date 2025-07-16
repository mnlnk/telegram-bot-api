<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Content;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет телефонный контакт, который будет отправлен в результате встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inputcontactmessagecontent
 *
 * @method      string getPhoneNumber()     Телефон контакта.
 * @method      string getFirstName()       Имя контакта.
 * @method string|null getLastName()    (+) Фамилия контакта.
 * @method string|null getVcard()       (+) Дополнительные данные о контакте в виде vCard.
 *
 * @method $this setPhoneNumber(string $phoneNumber) Телефон контакта.
 * @method $this setFirstName(string $firstName)     Имя контакта.
 * @method $this setLastName(string $lastName)       Фамилия контакта.
 * @method $this setVcard(string $vcard)             Дополнительные данные о контакте в виде vCard.
 *
 * @see https://en.wikipedia.org/wiki/VCard
 */
#[Required([
    'phone_number',
    'first_name'
])]
class InputContactMessageContent extends InputMessageContent
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $phoneNumber,
        string $firstName,
        ?string $lastName = null,
        ?string $vcard = null // 0-2048 bytes
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
