<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Transaction;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Transaction\Partners\TransactionPartner;

/**
 * Представляет транзакцию Telegram Star.
 *
 * @link https://core.telegram.org/bots/api#startransaction
 *
 * @method                  string getTransactionId()     Уникальный идентификатор транзакции.
 * @method                     int getAmount()            Количество Telegram Stars, переданных в результате транзакции.
 * @method                     int getDate()              Дата создания транзакции по времени Unix.
 * @method TransactionPartner|null getSource()        (+) Объект источника входящей транзакции (например, покупка пользователем товаров или услуг, Fragment возвращающий деньги при неудачном выводе средств). Только для входящих транзакций.
 * @method TransactionPartner|null getReceiver()      (+) Объект получателя исходящей транзакции (например, пользователь для возврата покупки, Fragment для вывода). Только для исходящих транзакций.
 */
#[Depends([
    'source' => TransactionPartner::class,
    'receiver' => TransactionPartner::class
])]
class StarTransaction extends Entity
{
    //
}
