<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Menu;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\WebAppInfo;

/**
 * Представляет кнопку меню, которая запускает веб-приложение.
 *
 * @link https://core.telegram.org/bots/api#menubuttonwebapp
 *
 * @method     string getType()   Тип кнопки.
 * @method     string getText()   Текст кнопки.
 * @method WebAppInfo getWebApp() Объект веб-приложения, которое будет запущено, когда пользователь нажмет кнопку.
 *
 * @method $this setText(string $text)         Текст кнопки.
 * @method $this setWebApp(WebAppInfo $webApp) Объект веб-приложения, которое будет запущено, когда пользователь нажмет кнопку.
 */
#[Required([
    'type',
    'text',
    'web_app'
])]
#[Depends([
    'web_app' => WebAppInfo::class
])]
class MenuButtonWebApp extends MenuButton
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = MenuButtonType::WEB_APP;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $text,
        WebAppInfo $webApp
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
