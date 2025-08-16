<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;

/**
 * Представляет служебное сообщение об одобрении предложенной публикации.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostapproved
 *
 * @method            Message|null getSuggestedPostMessage() (+) Объект сообщения, которое было одобрено.
 * @method SuggestedPostPrice|null getPrice()                (+) Сумма, уплаченная за публикацию.
 * @method                     int getSendDate()                 Дата публикации поста
 *
 * @since 9.2
 */
#[Required([
    'send_date'
])]
#[Depends([
   'suggested_post_message' => Message::class,
   'price' => SuggestedPostPrice::class
])]
class SuggestedPostApproved extends Entity
{
    //
}
