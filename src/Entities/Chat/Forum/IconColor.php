<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum;

/**
 * Представляет цвета иконок тем форума.
 *
 * @see https://core.telegram.org/bots/api#createforumtopic
 */
abstract class IconColor
{
    /**
     * Голубой.
     *
     * @var int
     */
    const BLUE = 7322096; // 0x6FB9F0

    /**
     * Желтый.
     *
     * @var int
     */
    const YELLOW = 16766590; // 0xFFD67E

    /**
     * Фиолетовый.
     *
     * @var int
     */
    const PURPLE = 13338331; // 0xCB86DB

    /**
     * Зеленый.
     *
     * @var int
     */
    const GREEN = 9367192; // 0x8EEE98

    /**
     * Розовый.
     *
     * @var int
     */
    const PINK = 16749490; // 0xFF93B2

    /**
     * Красный.
     *
     * @var int
     */
    const RED = 16478047; // 0xFB6F5F

    # # #

    /**
     * Цвета иконок тем.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::BLUE,
            static::YELLOW,
            static::PURPLE,
            static::GREEN,
            static::PINK,
            static::RED
        ];
    }
}
