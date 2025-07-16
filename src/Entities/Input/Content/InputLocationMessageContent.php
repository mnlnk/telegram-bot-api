<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Content;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет местоположение, которое будет отправлено в результате встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inputlocationmessagecontent
 *
 * @method      float getLatitude()                 Широта местоположения в градусах.
 * @method      float getLongitude()                Долгота местоположения в градусах.
 * @method float|null getHorizontalAccuracy()   (+) Радиус неопределенности местоположения, измеряемый в метрах.
 * @method   int|null getLivePeriod()           (+) Период в секундах, в течение которого местоположение может быть обновлено.
 * @method   int|null getHeading()              (+) Направление, в котором движется пользователь, в градусах. (для живых местоположений).
 * @method   int|null getProximityAlertRadius() (+) Максимальное расстояние для предупреждений о приближении к другому участнику чата в метрах. (для живых местоположений).
 *
 * @method $this setLatitude(float $latitude)                       Широта местоположения в градусах.
 * @method $this setLongitude(float $longitude)                     Долгота местоположения в градусах.
 * @method $this setHorizontalAccuracy(float $horizontalAccuracy)   Радиус неопределенности местоположения, измеряемый в метрах.
 * @method $this setLivePeriod(int $livePeriod)                     Период в секундах, в течение которого местоположение может быть обновлено.
 * @method $this setHeading(int $heading)                           Направление, в котором движется пользователь, в градусах. (для живых местоположений).
 * @method $this setProximityAlertRadius(int $proximityAlertRadius) Максимальное расстояние для предупреждений о приближении к другому участнику чата в метрах. (для живых местоположений).
 */
#[Required([
    'latitude',
    'longitude'
])]
class InputLocationMessageContent extends InputMessageContent
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        float $latitude,
        float $longitude,
        ?float $horizontalAccuracy = null, // 0-1500
        ?int $livePeriod = null, // 60-86400
        ?int $heading = null, // 1-360
        ?int $proximityAlertRadius = null // 1-100000
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
