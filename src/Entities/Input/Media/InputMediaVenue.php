<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет место проведение.
 *
 * @link https://core.telegram.org/bots/api#inputmediavenue
 *
 * @method      string getType()                Тип результата. (Всегда "venue".)
 * @method       float getLatitude()            Широта местоположения.
 * @method       float getLongitude()           Долгота местоположения.
 * @method      string getTitle()               Название места проведения.
 * @method      string getAddress()             Адрес места проведения мероприятия.
 * @method string|null getFoursquareId()    (+) Идентификатор заведения в Foursquare.
 * @method string|null getFoursquareType()  (+) Тип заведения в Foursquare, если известен. (Например, "arts_entertainment/default", "arts_entertainment/aquarium" или "food/icecream".)
 * @method string|null getGooglePlaceId()   (+) Идентификатор места проведения мероприятия в Google Places.
 * @method string|null getGooglePlaceType() (+) Тип заведения, указанный в Google Places.
 *
 * @method $this setLatitude(float $latitude)                Широта местоположения.
 * @method $this setLongitude(float $longitude)              Долгота местоположения.
 * @method $this setTitle(string $title)                     Название места проведения.
 * @method $this setAddress(string $address)                 Адрес места проведения мероприятия.
 * @method $this setFoursquareId(string $foursquareId)       Идентификатор заведения в Foursquare.
 * @method $this setFoursquareType(string $foursquareType)   Тип заведения в Foursquare, если известен. (Например, "arts_entertainment/default", "arts_entertainment/aquarium" или "food/icecream".)
 * @method $this setGooglePlaceId(string $googlePlaceId)     Идентификатор места проведения мероприятия в Google Places.
 * @method $this setGooglePlaceType(string $googlePlaceType) Тип заведения, указанный в Google Places.
 *
 * @see https://developers.google.com/maps/documentation/places/web-service/legacy/supported_types?hl=ru
 *
 * @since 10.0
 */
#[Required([
    'type',
    'latitude',
    'longitude',
    'title',
    'address'
])]
class InputMediaVenue extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputMediaType::VENUE;

        parent::__construct($data);
    }

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
