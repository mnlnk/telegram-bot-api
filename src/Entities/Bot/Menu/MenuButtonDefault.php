<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Menu;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет кнопку меню для которой не задано конкретное значение.
 *
 * @link https://core.telegram.org/bots/api#menubuttondefault
 *
 * @method string getType() Тип кнопки.
 */
#[Required([
    'type'
])]
class MenuButtonDefault extends MenuButton
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = MenuButtonType::DEFAULT;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        //
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
