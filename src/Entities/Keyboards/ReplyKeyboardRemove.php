<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет команду для удаления пользовательской клавиатуры.
 *
 * @link https://core.telegram.org/bots/api#replykeyboardremove
 *
 * @method      bool getRemoveKeyboard()     Удалить пользовательскую клавиатуру.
 * @method bool|null getSelective()      (+) Удалить клавиатуру только для определенных пользователей.
 *
 * @method $this setSelective(bool $selective) Удалить клавиатуру только для определенных пользователей.
 */
#[Required([
    'remove_keyboard'
])]
class ReplyKeyboardRemove extends KeyboardMarkup
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['remove_keyboard'] = true;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности удаления клавиатуры.
     */
    public static function make(
        ?bool $selective = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
