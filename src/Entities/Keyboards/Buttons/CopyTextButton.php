<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет встроенную кнопку клавиатуры, которая копирует указанный текст в буфер обмена.
 *
 * @link https://core.telegram.org/bots/api#copytextbutton
 *
 * @method string getText() Текст, который необходимо скопировать в буфер обмена.
 *
 * @method $this setText(string $text) Текст, который необходимо скопировать в буфер обмена. (1-256)
 */
#[Required([
    'text'
])]
class CopyTextButton extends Button
{
    /**
     * Создает объект сущности кнопки.
     */
    public static function make(
        string $text // 1-256
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
