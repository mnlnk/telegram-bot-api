<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;

/**
 * Представляет служебное сообщение о возврате платежа за предложенную публикацию.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostrefunded
 *
 * @method Message|null getSuggestedPostMessage() (+) Сообщение, содержащее предложенный пост.
 * @method       string getReason()                   Причина возврата. В настоящее время это может быть "post_deleted", если публикация была удалена в течение 24 часов после публикации или удалена из запланированных сообщений без публикации, или "payment_refunded", если плательщик вернул платеж.
 *
 * @since 9.2
 */
#[Required([
    'reason'
])]
#[Depends([
    'suggested_post_message' => Message::class
])]
class SuggestedPostRefunded extends Entity
{
    //
}
