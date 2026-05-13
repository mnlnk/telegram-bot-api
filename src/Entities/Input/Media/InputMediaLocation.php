<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет отправляемую локацию.
 *
 * @link https://core.telegram.org/bots/api#inputmedialocation
 *
 * @method     string getType()                   Тип результата. (Всегда "location".)
 * @method      float getLatitude()               Широта.
 * @method      float getLongitude()              Долгота.
 * @method float|null getHorizontalAccuracy() (+) Радиус неопределенности местоположения, измеряемый в метрах.
 *
 * @method $this setLatitude(float $latitude)                     Широта.
 * @method $this setLongitude(float $longitude)                   Долгота.
 * @method $this setHorizontalAccuracy(float $horizontalAccuracy) Радиус неопределенности местоположения, измеряемый в метрах: 0-1500.
 *
 * @since 10.0
 */
#[Required([
    'type',
    'latitude',
    'longitude'
])]
class InputMediaLocation extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputMediaType::LOCATION;

        parent::__construct($data);
    }

    /**
     * Создает объект сущности.
     */
    public static function make(
        float $latitude,
        float $longitude,
        ?float $horizontalAccuracy = null // 0-1500
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
