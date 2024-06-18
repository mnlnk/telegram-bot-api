<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Transaction\Withdrawal;

/**
 * Представляет тип состояния.
 *
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstate
 */
abstract class RevenueWithdrawalStateType
{
    /**
     * Вывод продолжается.
     *
     * @var string
     */
    const PENDING = 'pending';

    /**
     * Вывод успешно завершен.
     *
     * @var string
     */
    const SUCCEEDED = 'succeeded';

    /**
     * Вывод завершен с ошибкой.
     *
     * @var string
     */
    const FAILED = 'failed';

    # # #

    /**
     * Типы состояний.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::PENDING,
            static::SUCCEEDED,
            static::FAILED
        ];
    }
}
