<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Transaction\Withdrawal;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет состояние: Вывод успешно завершен.
 *
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstatesucceeded
 *
 * @method string getType() Тип состояния.
 * @method    int getDate() Дата завершения вывода по времени Unix.
 * @method string getUrl()  URL-адрес HTTPS, который можно использовать для просмотра деталей транзакции.
 */
#[Required([
    'type',
    'date',
    'url'
])]
class RevenueWithdrawalStateSucceeded extends RevenueWithdrawalState
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = RevenueWithdrawalStateType::SUCCEEDED;

        parent::__construct($data);
    }
}
