<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет информацию о заказе.
 *
 * @link https://core.telegram.org/bots/api#orderinfo
 *
 * @method          string|null getName()            (+) Имя пользователя.
 * @method          string|null getPhoneNumber()     (+) Номер телефона пользователя.
 * @method          string|null getEmail()           (+) Адрес электронной почты пользователя.
 * @method ShippingAddress|null getShippingAddress() (+) Объект адреса доставки пользователя.
 */
#[Depends([
    'shipping_address' => ShippingAddress::class
])]
class OrderInfo extends Entity
{
    //
}
