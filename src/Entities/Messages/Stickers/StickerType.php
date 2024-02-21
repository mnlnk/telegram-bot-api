<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers;

/**
 * Представляет типы стикеров.
 *
 * @link https://core.telegram.org/bots/api#sticker
 */
abstract class StickerType
{
    /**
     * Обычный.
     *
     * @var string
     */
    const REGULAR = 'regular';

    /**
     * Маска.
     *
     * @var string
     */
    const MASK = 'mask';

    /**
     * Пользовательский эмоджи-стикер.
     *
     * @var string
     */
    const CUSTOM_EMOJI = 'custom_emoji';

    # # #

    /**
     * Типы стикеров.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::REGULAR,
            static::MASK,
            static::CUSTOM_EMOJI
        ];
    }
}
