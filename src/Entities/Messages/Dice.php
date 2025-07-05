<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет игральную кость в виде анимированного эмоджи, отображающего случайное значение.
 *
 * @link https://core.telegram.org/bots/api#dice
 *
 * @method string getEmoji() Эмоджи, на котором основана анимация броска кости.
 * @method    int getValue() Значение игральных костей (значение зависит от типа эмоджи).
 */
#[Required([
    'emoji',
    'value'
])]
class Dice extends Entity
{
    /**
     * Дартс. 🎯
     *
     * @see getEmoji()
     */
    public function isDarts(): bool
    {
        return $this->getEmoji() == DiceEmoji::DARTS;
    }

    /**
     * Игральный кубик. 🎲
     *
     * @see getEmoji()
     */
    public function isDice(): bool
    {
        return $this->getEmoji() == DiceEmoji::DICE;
    }

    /**
     * Баскетбол. 🏀
     *
     * @see getEmoji()
     */
    public function isBasketball(): bool
    {
        return $this->getEmoji() == DiceEmoji::BASKETBALL;
    }

    /**
     * Боулинг. 🎳
     *
     * @see getEmoji()
     */
    public function isBowling(): bool
    {
        return $this->getEmoji() == DiceEmoji::BOWLING;
    }

    /**
     * Футбол. ⚽
     *
     * @see getEmoji()
     */
    public function isFootball(): bool
    {
        return $this->getEmoji() == DiceEmoji::FOOTBALL;
    }

    /**
     * Игровой автомат. 🎰
     *
     * @see getEmoji()
     */
    public function isSlotMachine(): bool
    {
        return $this->getEmoji() == DiceEmoji::SLOT_MACHINE;
    }
}
