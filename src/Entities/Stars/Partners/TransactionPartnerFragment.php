<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Stars\Withdrawal\RevenueWithdrawalState;

/**
 * Представляет транзакцию вывода средств с помощью Fragment.
 *
 * @link https://core.telegram.org/bots/api#transactionpartnerfragment
 *
 * @method                      string getType()                Тип партнера по транзакции.
 * @method RevenueWithdrawalState|null getWithdrawalState() (+) Объект остояния транзакции, если транзакция исходящая.
 */
#[Required([
    'type'
])]
#[Depends([
    'withdrawal_state' => RevenueWithdrawalState::class
])]
class TransactionPartnerFragment extends TransactionPartner
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = TransactionPartnerType::FRAGMENT;

        parent::__construct($data);
    }
}
