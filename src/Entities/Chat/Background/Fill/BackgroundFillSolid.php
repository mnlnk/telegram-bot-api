<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Fill;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет фон заполненый выбранным цветом.
 *
 * @link https://core.telegram.org/bots/api#backgroundfillsolid
 *
 * @method string getType()  Тип заливки фона.
 * @method    int getColor() Цвет фоновой заливки в формате RGB24.
 */
#[Required([
    'type',
    'color'
])]
class BackgroundFillSolid extends BackgroundFill
{
    //
}
