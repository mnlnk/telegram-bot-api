<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет информацию о платной покупке медиа.
 *
 * @link https://core.telegram.org/bots/api#paidmediapurchased
 *
 * @method   User getFrom()             Объект пользователя, купившего медиа.
 * @method string getPaidMediaPayload() Полезная нагрузка платного медиа, указанная ботом.
 */
#[Required([
    'from',
    'paid_media_payload'
])]
#[Depends([
    'from' => User::class
])]
class PaidMediaPurchased extends Entity implements UpdateContext
{
    //
}
