<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет входящий запрос на доставку.
 *
 * @link https://core.telegram.org/bots/api#shippingquery
 *
 * @method          string getId()              Уникальный идентификатор запроса.
 * @method            User getFrom()            Объект пользователя, отправившего запрос.
 * @method          string getInvoicePayload()  Полезная нагрузка счет-фактуры, указанная ботом.
 * @method ShippingAddress getShippingAddress() Объект адреса доставки.
 */
#[Required([
    'id',
    'from',
    'invoice_payload',
    'shipping_address'
])]
#[Depends([
    'from' => User::class,
    'shipping_address' => ShippingAddress::class
])]
class ShippingQuery extends Entity implements UpdateContext
{
    //
}
