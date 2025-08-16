<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;

/**
 * Описывает служебное сообщение об ошибке одобрения предлагаемой публикации.
 * В настоящее время это происходит только из-за недостатка средств у пользователя на момент одобрения.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostapprovalfailed
 *
 * @method       Message|null getSuggestedPostMessage() (+) Сообщение, содержащее предложенную публикацию, одобрение которой не состоялось.
 * @method SuggestedPostPrice getPrice()                    Ожидаемая цена поста.
 *
 * @since 9.2
 */
#[Required([
    'price'
])]
#[Depends([
    'suggested_post_message' => Message::class,
    'price' => SuggestedPostPrice::class
])]
class SuggestedPostApprovalFailed extends Entity
{
    //
}
