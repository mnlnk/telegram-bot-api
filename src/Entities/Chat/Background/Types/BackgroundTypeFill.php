<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Fill\BackgroundFill;

/**
 * Представляет фон заполненый на основе выбранных цветов.
 *
 * @link https://core.telegram.org/bots/api#backgroundtypefill
 *
 * @method         string getType()             Тип фона.
 * @method BackgroundFill getFill()             Фоновая заливка.
 * @method            int getDarkThemeDimming() Затемнение фона в темных темах, в процентах; 0-100.
 */
#[Required([
    'type',
    'fill',
    'dark_theme_dimming'
])]
#[Depends([
    'fill' => BackgroundFill::class
])]
class BackgroundTypeFill extends BackgroundType
{
    //
}
