<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Owner;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет служебное сообщение об изменении владельца в чате.
 *
 * @link https://core.telegram.org/bots/api#chatownerchanged
 *
 * @method User getNewOwner() Новый владелец чата.
 *
 * @since 9.4
 */
#[Required([
    'new_owner'
])]
#[Depends([
    'new_owner' => User::class
])]
class ChatOwnerChanged extends Entity
{
    //
}
