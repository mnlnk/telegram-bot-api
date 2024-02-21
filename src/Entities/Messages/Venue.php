<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет место проведения (место встречи).
 *
 * @link https://core.telegram.org/bots/api#venue
 *
 * @method    Location getLocation()            Объект локации места проведения. (Не может быть активной локацией).
 * @method      string getTitle()               Название места проведения.
 * @method      string getAddress()             Адрес места проведения.
 * @method string|null getFoursquareId()    (+) Foursquare идентификатор места проведения.
 * @method string|null getFoursquareType()  (+) Foursquare тип площадки. (Например, "arts_entertainment/default", "arts_entertainment/aquarium" или "food/icecream").
 * @method string|null getGooglePlaceId()   (+) Идентификатор места проведения в Google Places.
 * @method string|null getGooglePlaceType() (+) Тип заведения в Google Places.
 *
 * @see https://developers.google.com/maps/documentation/places/web-service/supported_types?hl=ru
 */
#[Required([
    'location',
    'title',
    'address'
])]
#[Depends([
    'location' => Location::class
])]
class Venue extends Entity
{
    //
}
