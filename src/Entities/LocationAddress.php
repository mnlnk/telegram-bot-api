<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет физический адрес местоположения.
 *
 * @link https://core.telegram.org/bots/api#locationaddress
 *
 * @method      string getCountryCode()     Двухбуквенный код страны ISO 3166-1, alpha-2, в которой находится местоположение.
 * @method string|null getState()       (+) Страна.
 * @method string|null getCity()        (+) Город.
 * @method string|null getStreet()      (+) Улица.
 *
 * @method $this setCountryCode(string $countryCode) Двухбуквенный код страны ISO 3166-1, alpha-2, в которой находится местоположение.
 * @method $this setState(string $state)             Страна.
 * @method $this setCity(string $city)               Город.
 * @method $this setStreet(string $street)           Улица.
 */
#[Required([
    'country_code'
])]
class LocationAddress extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $countryCode, // ISO 3166-1, alpha-2
        ?string $state = null,
        ?string $city = null,
        ?string $street = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
