<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments\Stars;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет список транзакций Telegram Star.
 *
 * @link https://core.telegram.org/bots/api#startransactions
 *
 * @method StarTransaction[] getTransactions() Массив объектов c информацией о транзакциях.
 */
#[Depends([
     'transactions' => [StarTransaction::class]
])]
class StarTransactions extends Entity
{
    //
}
