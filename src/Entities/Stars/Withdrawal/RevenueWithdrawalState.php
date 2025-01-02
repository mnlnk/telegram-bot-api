<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Withdrawal;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет состояние операции вывода дохода.
 *
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstate
 *
 * @see RevenueWithdrawalStatePending
 * @see RevenueWithdrawalStateSucceeded
 * @see RevenueWithdrawalStateFailed
 */
#[Concrete]
abstract class RevenueWithdrawalState extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            RevenueWithdrawalStateType::PENDING   => new RevenueWithdrawalStatePending($data),
            RevenueWithdrawalStateType::SUCCEEDED => new RevenueWithdrawalStateSucceeded($data),
            RevenueWithdrawalStateType::FAILED    => new RevenueWithdrawalStateFailed($data),
            default                               => null
        };
    }
}
