<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет точку на карте (локацию).
 *
 * @link https://core.telegram.org/bots/api#location
 *
 * @method      float getLongitude()                Долгота, определяемая отправителем.
 * @method      float getLatitude()                 Широта, определяемая отправителем.
 * @method float|null getHorizontalAccuracy()   (+) Радиус неопределенности местоположения, измеряемый в метрах; 0-1500.
 * @method   int|null getLivePeriod()           (+) Время относительно даты отправки сообщения, в течение которого местоположение может быть обновлено; в секундах.
 * @method   int|null getHeading()              (+) Направление, в котором движется пользователь, в градусах; 1-360.
 * @method   int|null getProximityAlertRadius() (+) Максимальное расстояние для предупреждения о приближении к другому участнику чата; в метрах.
 */
#[Required([
    'longitude',
    'latitude'
])]
class Location extends Entity
{
    //
}
