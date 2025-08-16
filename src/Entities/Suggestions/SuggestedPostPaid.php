<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;
use Manuylenko\Telegram\Bot\Api\Entities\Stars\StarAmount;

/**
 * Представляет служебное сообщение об успешной оплате предложенной публикации.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostpaid
 *
 * @method    Message|null getSuggestedPostMessage() (+) Сообщение, содержащее предлагаемую публикацию.
 * @method          string getCurrency()                 Валюта, в которой был произведен платеж. В настоящее время это одна из валют: "XTR" для звезд Телеграм или "TON" для тонкоинов.
 * @method        int|null getAmount()               (+) Сумма валюты, поступившей на канал в нанотонкоинах; только для платежей в тонкоинах.
 * @method StarAmount|null getStarAmount()           (+) Количество звезд Телеграм, полученных каналом; только для платежей в звездами Телеграм.
 *
 * @since 9.2
 */
#[Required([
    'currency'
])]
#[Depends([
    'suggested_post_message' => Message::class,
    'star_amount' => StarAmount::class
])]
class SuggestedPostPaid extends Entity
{
    //
}
