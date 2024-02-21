<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

/**
 * Представляет типы опросов.
 *
 * @link https://core.telegram.org/bots/api#poll
 */
abstract class PollType
{
    /**
     * Простой опрос.
     *
     * @var string
     */
    const REGULAR = 'regular';

    /**
     * Викторина.
     *
     * @var string
     */
    const QUIZ = 'quiz';

    # # #

    /**
     * Типы опросов.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::REGULAR,
            static::QUIZ
        ];
    }
}
