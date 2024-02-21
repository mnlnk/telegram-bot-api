<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет входящий запрос предварительной проверки заказа.
 *
 * @link https://core.telegram.org/bots/api#precheckoutquery
 *
 * @method         string getId()                   Уникальный идентификатор запроса.
 * @method           User getFrom()                 Объект пользователя, отправившего запрос.
 * @method         string getCurrency()             Трех-буквенный код валюты. (ISO 4217).
 * @method            int getTotalAmount()          Общая цена в наименьших единицах валюты (целое число, а не число с плавающей запятой/двойное число).
 * @method         string getInvoicePayload()       Полезная нагрузка счет-фактуры, указанная ботом.
 * @method    string|null getShippingOptionId() (+) Идентификатор выбранного пользователем варианта доставки.
 * @method OrderInfo|null getOrderInfo()        (+) Объект с информацией о заказе, предоставленной пользователем.
 *
 * @see https://core.telegram.org/bots/payments#supported-currencies
 */
#[Required([
    'id',
    'from',
    'currency',
    'total_amount',
    'invoice_payload'
])]
#[Depends([
    'from' => User::class,
    'order_info' => OrderInfo::class
])]
class PreCheckoutQuery extends Entity implements UpdateContext
{
    //
}
