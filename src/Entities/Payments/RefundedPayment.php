<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет основную информацию о возвращенных платежах.
 *
 * @link https://core.telegram.org/bots/api#refundedpayment
 *
 * @method      string getCurrency()                    Трехбуквенный код валюты ISO-4217 или «XTR» для платежей в Telegram Stars.
 * @method         int getTotalAmount()                 Общая цена в наименьших единицах валюты.
 * @method      string getInvoicePayload()              Полезная нагрузка счет-фактуры, указанная ботом.
 * @method      string getTelegramPaymentChargeId()     Идентификатор платежа Telegram.
 * @method string|null getProviderPaymentChargeId() (+) Идентификатор платежа поставщика.
 */
#[Required([
    'currency',
    'total_amount',
    'invoice_payload',
    'telegram_payment_charge_id'
])]
class RefundedPayment extends Entity
{
    //
}
