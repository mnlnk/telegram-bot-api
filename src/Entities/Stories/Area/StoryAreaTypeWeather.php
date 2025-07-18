<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories\Area;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет область истории, содержащую информацию о погоде. В настоящее время в истории может быть до 3 областей с погодой.
 *
 * @link https://core.telegram.org/bots/api#storyareatypeweather
 *
 * @method string getType()            Тип области.
 * @method  float getTemperature()     Температура, в градусах Цельсия.
 * @method string getEmoji()           Эмодзи, представляющие погоду.
 * @method    int getBackgroundColor() Цвет фона области в формате ARGB.
 *
 * @method $this setTemperature(float $temperature)       Температура, в градусах Цельсия.
 * @method $this setEmoji(string $emoji)                  Эмодзи, представляющие погоду.
 * @method $this setBackgroundColor(int $backgroundColor) Цвет фона области в формате ARGB.
 */
#[Required([
    'type',
    'temperature',
    'emoji',
    'background_color'
])]
class StoryAreaTypeWeather extends StoryAreaType
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = StoryAreaType::WEATHER;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        float $temperature,
        string $emoji,
        int $backgroundColor // ARGB
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
