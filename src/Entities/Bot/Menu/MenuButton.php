<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Menu;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет кнопку меню в приватном чате с ботом.
 *
 * @link https://core.telegram.org/bots/api#menubutton
 *
 * @see MenuButtonCommands
 * @see MenuButtonWebApp
 * @see MenuButtonDefault
 */
#[Concrete]
abstract class MenuButton extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            MenuButtonType::COMMANDS => new MenuButtonCommands($data),
            MenuButtonType::WEB_APP  => new MenuButtonWebApp($data),
            MenuButtonType::DEFAULT  => new MenuButtonDefault($data),
            default                  => null
        };
    }
}
