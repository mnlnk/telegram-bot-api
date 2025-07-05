<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет тип фона.
 *
 * @link https://core.telegram.org/bots/api#backgroundtype
 *
 * @see BackgroundTypeFill
 * @see BackgroundTypeWallpaper
 * @see BackgroundTypePattern
 * @see BackgroundTypeChatTheme
 */
#[Concrete]
abstract class BackgroundType extends Entity
{
    /**
     * Заливка цветом.
     *
     * @var string
     */
    const FILL = 'fill';

    /**
     * Обои.
     *
     * @var string
     */
    const WALLPAPER = 'wallpaper';

    /**
     * Паттерн.
     *
     * @var string
     */
    const PATTERN = 'pattern';

    /**
     * Тема чата.
     *
     * @var string
     */
    const CHAT_THEME = 'chat_theme';

    # # #

    /**
     * Типы фонов.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::FILL,
            static::WALLPAPER,
            static::PATTERN,
            static::CHAT_THEME
        ];
    }

    # # #

    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            static::FILL       => new BackgroundTypeFill($data),
            static::WALLPAPER  => new BackgroundTypeWallpaper($data),
            static::PATTERN    => new BackgroundTypePattern($data),
            static::CHAT_THEME => new BackgroundTypeChatTheme($data),
            default            => null
        };
    }
}
