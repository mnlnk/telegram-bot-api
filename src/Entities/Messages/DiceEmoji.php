<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

/**
 * Представляет эмоджи игральной кости.
 *
 * @link https://core.telegram.org/bots/api#dice
 */
abstract class DiceEmoji
{
    /**
     * Дартс. [1-6]
     *
     * @var string
     */
    const DARTS = '🎯';

    /**
     * Игральный кубик. [1-6]
     *
     * @var string
     */
    const DICE = '🎲';

    /**
     * Баскетбол. [1-5]
     *
     * @var string
     */
    const BASKETBALL = '🏀';

    /**
     * Боулинг. [1-6]
     *
     * @var string
     */
    const BOWLING = '🎳';

    /**
     * Футбол. [1-5]
     *
     * @var string
     */
    const FOOTBALL = '⚽';

    /**
     * Игровой автомат. [1-64]
     *
     * @var string
     */
    const SLOT_MACHINE = '🎰';

    # # #

    /**
     * Эмоджи игральной кости.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::DARTS,
            static::DICE,
            static::BASKETBALL,
            static::BOWLING,
            static::FOOTBALL,
            static::SLOT_MACHINE
        ];
    }
}
