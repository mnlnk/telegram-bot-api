<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет адрес доставки.
 *
 * @link https://core.telegram.org/bots/api#shippingaddress
 *
 * @method string getCountryCode() Двух-буквенный код страны ISO 3166-1 alpha-2.
 * @method string getState()       Название государства, если применимо.
 * @method string getCity()        Название города.
 * @method string getStreetLine1() Первая строка адреса.
 * @method string getStreetLine2() Вторая строка адреса.
 * @method string getPostCode()    Почтовый индекс адреса.
 *
 * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
 */
#[Required([
    'country_code',
    'state',
    'city',
    'street_line1',
    'street_line2',
    'post_code'
])]
class ShippingAddress extends Entity
{
    //
}
