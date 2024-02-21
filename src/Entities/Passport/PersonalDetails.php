<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет личные данные.
 *
 * @link https://core.telegram.org/passport#personaldetails
 *
 * @method      string getFirstName()                Имя.
 * @method      string getLastName()                 Фамилия.
 * @method string|null getMiddleName()           (+) Отчество.
 * @method      string getBirthDate()                Дата рождения; в формате ДД.ММ.ГГГГ.
 * @method      string getGender()                   Пол; мужской или женский.
 * @method      string getCountryCode()              Гражданство ISO 3166-1 alpha-2.
 * @method      string getResidenceCountryCode()     Страна проживания ISO 3166-1 alpha-2.
 * @method      string getFirstNameNative()          Имя на языке страны проживания.
 * @method      string getLastNameNative()           Фамилия на языке страны проживания.
 * @method string|null getMiddleNameNative()     (+) Отчество на языке страны проживания.
 */
#[Required([
    'first_name',
    'last_name',
    'birth_date',
    'gender',
    'country_code',
    'residence_country_code',
    'first_name_native',
    'last_name_native'
])]
class PersonalDetails extends Entity
{
    //
}
