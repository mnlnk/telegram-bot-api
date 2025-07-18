<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories\Area;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\LocationAddress;

/**
 * Представляет область истории, указывающую на локацию. В настоящее время история может иметь до 10 областей локаций.
 *
 * @link https://core.telegram.org/bots/api#storyareatypelocation
 *
 * @method               string getType()          Тип области.
 * @method                float getLatitude()      Широта местоположения в градусах.
 * @method                float getLongitude()     Долгота местоположения в градусах.
 * @method LocationAddress|null getAddress()   (+) Объект адреса локации.
 *
 * @method $this setLatitude(float $latitude)         Широта местоположения в градусах.
 * @method $this setLongitude(float $longitude)       Долгота местоположения в градусах.
 * @method $this setAddress(LocationAddress $address) Объект адреса локации.
 */
#[Required([
    'type',
    'latitude',
    'longitude'
])]
#[Depends([
    'address' => LocationAddress::class
])]
class StoryAreaTypeLocation extends StoryAreaType
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = StoryAreaType::LOCATION;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        float $latitude,
        float $longitude,
        ?LocationAddress $address = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
