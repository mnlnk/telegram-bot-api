<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет фон подарка.
 *
 * @link https://core.telegram.org/bots/api#giftbackground
 *
 * @method int getCenterColor() Центральный цвет фона (RGB).
 * @method int getEdgeColor()   Цвет контура фона в (RGB).
 * @method int getTextColor()   Цвет фона текста (RGB).
 *
 * @since 9.3
 */
#[Required([
    'center_color',
    'edge_color',
    'text_color'
])]
class GiftBackground extends Entity
{
    //
}
