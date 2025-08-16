<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

/**
 * Представляет состояние предлагаемого поста.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostinfo
 *
 * @since 9.2
 */
abstract class SuggestedPostState
{
    /**
     * В ожидании.
     *
     * @var string
     */
    const PENDING = 'pending';

    /**
     * Одобрено.
     *
     * @var string
     */
    const APPROVED = 'approved';

    /**
     * Отклонено.
     *
     * @var string
     */
    const DECLINED = 'declined';

    # # #

    /**
     * Состояния.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::PENDING,
            static::APPROVED,
            static::DECLINED
        ];
    }
}
