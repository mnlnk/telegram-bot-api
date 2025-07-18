<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет сервисное сообщение об изменении стоимости платных сообщений внутри чата.
 *
 * @link https://core.telegram.org/bots/api#paidmessagepricechanged
 *
 * @method int getPaidMessageStarCount() Новое количество звёзд Телеграм, которое должны платить пользователи супергруппового чата, не являющиеся администраторами, за каждое отправленное сообщение.
 */
#[Required([
    'paid_message_star_count'
])]
class PaidMessagePriceChanged extends Entity
{
    //
}
