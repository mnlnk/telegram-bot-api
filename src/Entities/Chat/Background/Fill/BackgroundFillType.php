<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Fill;

/**
 * Представляет типы заливки фона.
 *
 * @link https://core.telegram.org/bots/api#backgroundfill
 */
abstract class BackgroundFillType
{
    /**
     * Сплошная.
     *
     * @var string
     */
    const SOLID = 'solid';

    /**
     * Градиент.
     *
     * @var string
     */
    const GRADIENT = 'gradient';

    /**
     * Свободный градиент.
     *
     * @var string
     */
    const FREEFORM_GRADIENT = 'freeform_gradient';

    # # #

    /**
     * Типы заливки фона.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::SOLID,
            static::GRADIENT,
            static::FREEFORM_GRADIENT
        ];
    }
}
