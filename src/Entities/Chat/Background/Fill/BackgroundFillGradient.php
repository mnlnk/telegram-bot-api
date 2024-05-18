<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Fill;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет градиентную заливку из двух цветов.
 *
 * @link https://core.telegram.org/bots/api#backgroundfillgradient
 *
 * @method string getType()          Тип заливки фона.
 * @method    int getTopColor()      Цвет верхней части градиента в формате RGB24.
 * @method    int getBottomColor()   Цвет нижной части градиента в формате RGB24.
 * @method    int getRotationAngle() Угол поворота фоновой заливки по часовой стрелке в градусах; 0-359.
 */
#[Required([
    'type',
    'top_color',
    'bottom_color',
    'rotation_angle'
])]
class BackgroundFillGradient extends BackgroundFill
{
    //
}
