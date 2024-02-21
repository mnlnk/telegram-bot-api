<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions;

use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Button;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\PollType;

/**
 * Представляет тип опроса, который разрешено создавать и отправлять при нажатии соответствующей кнопки.
 *
 * @link https://core.telegram.org/bots/api#keyboardbuttonpolltype
 *
 * @method string|null getType() (+) Тип опроса.
 *
 * @method $this setType(string $type) Тип опроса.
 */
class KeyboardButtonPollType extends Button
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        ?string $type = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }

    /**
     * Викторина.
     */
    public static function quiz(): static
    {
        return static::make(PollType::QUIZ);
    }

    /**
     * Обычный опрос.
     */
    public static function regular(): static
    {
        return static::make(PollType::REGULAR);
    }
}
