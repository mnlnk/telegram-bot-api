<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\KeyboardButton;

/**
 * Представляет пользовательскую клавиатуру с вариантами ответа.
 *
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 *
 * @method     array[] getKeyboard()                  Массив строк кнопок, каждая из которых представлена массивом объектов KeyboardButton.
 * @method   bool|null getIsPersistent()          (+) Всегда отображать клавиатуру, когда обычная клавиатура скрыта.
 * @method   bool|null getResizeKeyboard()        (+) Изменять размер клавиатуры по вертикали для оптимального соответствия.
 * @method   bool|null getOneTimeKeyboard()       (+) Скрывать клавиатуру сразу после ее использования.
 * @method string|null getInputFieldPlaceholder() (+) Текст подсказки, который будет отображаться в поле ввода, когда клавиатура активна.
 * @method   bool|null getSelective()             (+) Показывать клавиатуру только определенным пользователям.
 *
 * @method $this setKeyboard(array[] $keyboard)                          Массив строк кнопок, каждая из которых представлена массивом объектов KeyboardButton.
 * @method $this setIsPersistent(bool $isPersistent)                     Всегда отображать клавиатуру, когда обычная клавиатура скрыта.
 * @method $this setResizeKeyboard(bool $resizeKeyboard)                 Изменять размер клавиатуры по вертикали для оптимального соответствия.
 * @method $this setOneTimeKeyboard(bool $oneTimeKeyboard)               Скрывать клавиатуру сразу после ее использования.
 * @method $this setInputFieldPlaceholder(string $inputFieldPlaceholder) Текст подсказки, который будет отображаться в поле ввода, когда клавиатура активна.
 * @method $this setSelective(bool $selective)                           Показывать клавиатуру только определенным пользователям.
 *
 * @see https://core.telegram.org/bots/features#keyboards
 */
#[Required([
    'keyboard'
])]
#[Depends([
    'keyboard' => [[KeyboardButton::class]]
])]
class ReplyKeyboardMarkup extends KeyboardMarkup
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        if (!isset($data['keyboard'])) {
            $data['keyboard'] = [];
        }

        parent::__construct($data);
    }

    /**
     * Добавляет ряд кнопок к клавиатуре.
     *
     * @param KeyboardButton[] $buttons
     */
    public function addRowOfButtons(array $buttons): static
    {
        $keyboard = $this->getKeyboard();

        $keyboard[] = $buttons;

        return $this->setKeyboard($keyboard);
    }

    # # #

    /**
     * Создает объект сущности пользовательской клавиатуры.
     *
     * @param KeyboardButton[][] $keyboard
     */
    public static function make(
        array $keyboard = [],
        ?bool $isPersistent = null,
        ?bool $resizeKeyboard = true,
        ?bool $oneTimeKeyboard = null,
        ?string $inputFieldPlaceholder = null,
        ?bool $selective = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
