<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;

/**
 * Представляет буст в чате, добавленный или измененный.
 *
 * @link https://core.telegram.org/bots/api#chatboostupdated
 *
 * @method      Chat getChat()  Объект чата, которому принадлежит буст.
 * @method ChatBoost getBoost() Объект с информацией о бусте чата.
 */
#[Required([
    'chat',
    'boost'
])]
#[Depends([
    'chat' => Chat::class,
    'boost' => ChatBoost::class
])]
class ChatBoostUpdated extends Entity implements UpdateContext
{
    //
}
