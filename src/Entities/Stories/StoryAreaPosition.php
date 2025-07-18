<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет положение кликабельной области в истории.
 *
 * @link https://core.telegram.org/bots/api#storyareaposition
 *
 * @method float getXPercentage()            Абсцисса центра области, в процентах от ширины медиа.
 * @method float getYPercentage()            Ордината центра области, в процентах от высоты медиа.
 * @method float getWidthPercentage()        Ширина прямоугольника области в процентах от ширины медиа.
 * @method float getHeightPercentage()       Высота прямоугольника области в процентах от высоты медиа.
 * @method float getRotationAngle()          Угол поворота прямоугольника по часовой стрелке, в градусах; 0-360.
 * @method float getCornerRadiusPercentage() Радиус скругления угла прямоугольника в процентах от ширины медиа.
 *
 * @method $this setXPercentage(float $xPercentage)                       Абсцисса центра области, в процентах от ширины медиа.
 * @method $this setYPercentage(float $yPercentage)                       Ордината центра области, в процентах от высоты медиа.
 * @method $this setWidthPercentage(float $widthPercentage)               Ширина прямоугольника области в процентах от ширины медиа.
 * @method $this setHeightPercentage(float $heightPercentage)             Высота прямоугольника области в процентах от высоты медиа.
 * @method $this setRotationAngle(float $rotationAngle)                   Угол поворота прямоугольника по часовой стрелке, в градусах; 0-360.
 * @method $this setCornerRadiusPercentage(float $cornerRadiusPercentage) Радиус скругления угла прямоугольника в процентах от ширины медиа.
 */
class StoryAreaPosition extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        float $xPercentage,
        float $yPercentage,
        float $widthPercentage,
        float $heightPercentage,
        float $rotationAngle,
        float $cornerRadiusPercentage
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
