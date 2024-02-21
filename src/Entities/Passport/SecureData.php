<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет реквизиты, необходимые для расшифровки зашифрованных данных.
 *
 * @link https://core.telegram.org/passport#securedata
 *
 * @method SecureValue|null getPersonalDetails()       (+) Объект реквизитов зашифрованных личных данных.
 * @method SecureValue|null getPassport()              (+) Объект реквизитов зашифрованного паспорта.
 * @method SecureValue|null getInternalPassport()      (+) Объект реквизитов зашифрованного внутреннего паспорта.
 * @method SecureValue|null getDriverLicense()         (+) Объект реквизитов зашифрованных водительских прав.
 * @method SecureValue|null getIdentityCard()          (+) Объект реквизитов зашифрованного удостоверения личности.
 * @method SecureValue|null getAddress()               (+) Объект реквизитов зашифрованного адреса проживания.
 * @method SecureValue|null getUtilityBill()           (+) Объект реквизитов зашифрованного счета за коммунальные услуги.
 * @method SecureValue|null getBankStatement()         (+) Объект реквизитов зашифрованной банковской выписки.
 * @method SecureValue|null getRentalAgreement()       (+) Объект реквизитов зашифрованного договора аренды.
 * @method SecureValue|null getPassportRegistration()  (+) Объект реквизитов зашифрованной регистрации из внутреннего паспорта.
 * @method SecureValue|null getTemporaryRegistration() (+) Объект реквизитов зашифрованной временной регистрации.
 */
#[Depends([
    'personal_details' => SecureValue::class,
    'passport' => SecureValue::class,
    'internal_passport' => SecureValue::class,
    'driver_license' => SecureValue::class,
    'identity_card' => SecureValue::class,
    'address' => SecureValue::class,
    'utility_bill' => SecureValue::class,
    'bank_statement' => SecureValue::class,
    'rental_agreement' => SecureValue::class,
    'passport_registration' => SecureValue::class,
    'temporary_registration' => SecureValue::class
])]
class SecureData extends Entity
{
    //
}
