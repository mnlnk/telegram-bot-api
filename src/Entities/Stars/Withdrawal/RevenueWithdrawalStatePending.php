<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Withdrawal;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет состояние: Вывод продолжается.
 *
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 *
 * @method string getType() Тип состояния.
 */
#[Required([
    'type'
])]
class RevenueWithdrawalStatePending extends RevenueWithdrawalState
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = RevenueWithdrawalStateType::PENDING;

        parent::__construct($data);
    }
}
