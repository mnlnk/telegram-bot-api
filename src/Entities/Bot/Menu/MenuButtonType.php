<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Menu;

/**
 * Представляет типы кнопок меню бота.
 *
 * @link https://core.telegram.org/bots/api#menubutton
 */
abstract class MenuButtonType
{
    /**
     * Команды.
     *
     * @var string
     */
    const COMMANDS = 'commands';

    /**
     * Веб-приложение.
     *
     * @var string
     */
    const WEB_APP = 'web_app';

    /**
     * По-умолчанию.
     *
     * @var string
     */
    const DEFAULT = 'default';

    # # #

    /**
     * Типы кнопок меню бота.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::COMMANDS,
            static::WEB_APP,
            static::DEFAULT
        ];
    }
}
