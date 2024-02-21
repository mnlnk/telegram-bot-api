<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\InlineKeyboardButton;

/**
 * Представляет встроенную клавиатуру, которая появляется рядом с сообщением, которому она принадлежит.
 *
 * @link https://core.telegram.org/bots/api#inlinekeyboardmarkup
 *
 * @method array[] getInlineKeyboard() Массив строк кнопок, каждая из которых представлена массивом объектов InlineKeyboardButton.
 *
 * @method $this setInlineKeyboard(array[] $inlineKeyboard) Массив строк кнопок, каждая из которых представлена массивом объектов InlineKeyboardButton.
 */
#[Required([
    'inline_keyboard'
])]
#[Depends([
    'inline_keyboard' => [[InlineKeyboardButton::class]]
])]
class InlineKeyboardMarkup extends KeyboardMarkup
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        if (!isset($data['inline_keyboard'])) {
            $data['inline_keyboard'] = [];
        }

        parent::__construct($data);
    }

    /**
     * Добавляет ряд кнопок к клавиатуре.
     *
     * @param InlineKeyboardButton[] $buttons
     */
    public function addRowOfButtons(array $buttons): static
    {
        $keyboard = $this->getInlineKeyboard();

        $keyboard[] = $buttons;

        return $this->setInlineKeyboard($keyboard);
    }

    # # #

    /**
     * Создает объект сущности встроеной клавиатуры.
     *
     * @param InlineKeyboardButton[][] $inlineKeyboard
     */
    public static function make(
        array $inlineKeyboard = []
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
