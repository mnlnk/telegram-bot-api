<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Withdrawal;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет состояние: Вывод завершен с ошибкой.
 *
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 *
 * @method string getType() Тип состояния.
 */
#[Required([
    'type'
])]
class RevenueWithdrawalStateFailed extends RevenueWithdrawalState
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = RevenueWithdrawalStateType::FAILED;

        parent::__construct($data);
    }
}
