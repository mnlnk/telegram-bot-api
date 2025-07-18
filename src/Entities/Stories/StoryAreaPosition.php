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
 */
class StoryAreaPosition extends Entity
{
    //
}
