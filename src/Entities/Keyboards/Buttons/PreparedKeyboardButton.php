<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет кнопку клавиатуры, используемую пользователем мини-приложения.
 *
 * @link https://core.telegram.org/bots/api#preparedkeyboardbutton
 *
 * @method string getId() Уникальный идентификатор кнопки клавиатуры.
 */
#[Required([
    'id'
])]
class PreparedKeyboardButton extends Entity
{
    //
}
