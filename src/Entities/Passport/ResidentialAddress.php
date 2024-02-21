<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет адрес проживания.
 *
 * @link https://core.telegram.org/passport#residentialaddress
 *
 * @method      string getStreetLine1()     Первая строка адреса.
 * @method string|null getStreetLine2() (+) Вторая строка адреса.
 * @method      string getCity()            Название города.
 * @method string|null getState()       (+) Название государства.
 * @method      string getCountryCode()     Код страны. (ISO 3166-1 alpha-2).
 * @method      string getPostCode()        Почтовый индекс адреса.
 */
#[Required([
    'street_line1',
    'city',
    'country_code',
    'post_code'
])]
class ResidentialAddress extends Entity
{
    //
}
