<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Content;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет место проведения (встречи), которое будет отправлено в результате встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inputvenuemessagecontent
 *
 * @method       float getLatitude()            Широта в градусах.
 * @method       float getLongitude()           Долгота места проведения в градусах.
 * @method      string getTitle()               Название места проведения.
 * @method      string getAddress()             Адрес места проведения.
 * @method string|null getFoursquareId()    (+) Foursquare идентификатор места проведения, если он известен.
 * @method string|null getFoursquareType()  (+) Foursquare тип места проведения, если известен.
 * @method string|null getGooglePlaceId()   (+) Google Places идентификатор места проведения, если известен.
 * @method string|null getGooglePlaceType() (+) Google Places тип места проведения, если известен.
 *
 * @method $this setLatitude(float $latitude)                Широта места проведения в градусах.
 * @method $this setLongitude(float $longitude)              Долгота места проведения в градусах.
 * @method $this setTitle(string $title)                     Название места проведения.
 * @method $this setAddress(string $address)                 Адрес места проведения.
 * @method $this setFoursquareId(string $foursquareId)       Foursquare идентификатор места проведения, если он известен.
 * @method $this setFoursquareType(string $foursquareType)   Foursquare тип места проведения, если известен.
 * @method $this setGooglePlaceId(string $googlePlaceId)     Google Places идентификатор места проведения, если известен.
 * @method $this setGooglePlaceType(string $googlePlaceType) Google Places тип места проведения, если известен.
 */
#[Required([
    'latitude',
    'longitude',
    'title',
    'address'
])]
class InputVenueMessageContent extends InputMessageContent
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        ?string $foursquareId = null,
        ?string $foursquareType = null,
        ?string $googlePlaceId = null,
        ?string $googlePlaceType = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
