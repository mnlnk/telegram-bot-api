<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers;

/**
 * Представляет форматы стикеров.
 *
 * @link https://core.telegram.org/bots/api#sticker
 */
abstract class StickerFormat
{
    /**
     * Статичный.
     *
     * @var string
     */
    const STATIC = 'static';

    /**
     * Анимированный.
     *
     * @var string
     */
    const ANIMATED = 'animated';

    /**
     * Видео.
     *
     * @var string
     */
    const VIDEO = 'video';

    # # #

    /**
     * Форматы стикеров.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::STATIC,
            static::ANIMATED,
            static::VIDEO
        ];
    }
}
