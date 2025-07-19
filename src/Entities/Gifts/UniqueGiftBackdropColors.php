<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Описывает цвета заднего фона уникального подарка.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftbackdropcolors
 *
 * @method int getCenterColor() Цвет в центре заднего фона в формате RGB.
 * @method int getEdgeColor()   Цвет по краям заднего фона в формате RGB.
 * @method int getSymbolColor() Цвет, который будет применен к символу в формате RGB.
 * @method int getTextColor()   Цвет текста на заднем фоне в формате RGB.
 */
#[Required([
    'center_color',
    'edge_color',
    'symbol_color',
    'text_color'
])]
class UniqueGiftBackdropColors extends Entity
{
    //
}
