<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements\EncryptedPassportElement;

/**
 * Представляет данные Телеграм Паспорт, которыми пользователь поделился с ботом.
 *
 * @link https://core.telegram.org/bots/api#passportdata
 *
 * @method EncryptedPassportElement[] getData()        Массив объектов с информацией о документах и других элементах Телеграм Паспорт, которыми поделились с ботом.
 * @method       EncryptedCredentials getCredentials() Объект с зашифрованными реквизитами, необходимыми для расшифровки данных.
 */
#[Required([
    'data',
    'credentials'
])]
#[Depends([
    'data' => [EncryptedPassportElement::class],
    'credentials' => EncryptedCredentials::class
])]
class PassportData extends Entity
{
    //
}
