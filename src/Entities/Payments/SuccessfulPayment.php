<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет основную информацию об успешном платеже.
 *
 * @link https://core.telegram.org/bots/api#successfulpayment
 *
 * @method         string getCurrency()                       Трех-буквенный код валюты (ISO 4217).
 * @method            int getTotalAmount()                    Общая цена товара в наименьших единицах валюты (целое число, а не число с плавающей запятой/двойное число).
 * @method         string getInvoicePayload()                 Полезная нагрузка счет-фактуры, указанная ботом.
 * @method       int|null getSubscriptionExpirationDate() (+) Дата окончания подписки по времени Unix; только для регулярных платежей.
 * @method      bool|null getIsRecurring()                (+) Платеж за подписку.
 * @method      bool|null getIsFirstRecurring()           (+) Первый платеж за подписку.
 * @method    string|null getShippingOptionId()           (+) Идентификатор варианта доставки, выбранный пользователем.
 * @method OrderInfo|null getOrderInfo()                  (+) Объект с информацией о заказе, предоставленной пользователем.
 * @method         string getTelegramPaymentChargeId()        Идентификатор платежа в Телеграм.
 * @method         string getProviderPaymentChargeId()        Идентификатор платежа у поставщика.
 *
 * @see https://core.telegram.org/bots/payments#supported-currencies
 */
#[Required([
    'currency',
    'total_amount',
    'invoice_payload',
    'telegram_payment_charge_id',
    'provider_payment_charge_id'
])]
#[Depends([
    'order_info' => OrderInfo::class
])]
class SuccessfulPayment extends Entity
{
    //
}
