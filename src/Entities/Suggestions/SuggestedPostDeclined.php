<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;

/**
 * Представляет служебное сообщение об отклонении предложенного поста.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostdeclined
 *
 * @method Message|null getSuggestedPostMessage() (+) Сообщение, содержащее предлогаемый пост.
 * @method  string|null getComment()              (+) Комментарии к отказу в публикации.
 *
 * @since 9.2
 */
#[Depends([
    'suggested_post_message' => Message::class
])]
class SuggestedPostDeclined extends Entity
{
    //
}
