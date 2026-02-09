<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Owner;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет служебное сообщение о том, что владелец чата покидает его.
 *
 * @link https://core.telegram.org/bots/api#chatownerleft
 *
 * @method User|null getNewOwner() (+) Пользователь, который станет новым владельцем чата, если предыдущий владелец не вернется в чат.
 *
 * @since 9.4
 */
#[Depends([
    'new_owner' => User::class
])]
class ChatOwnerLeft extends Entity
{
    //
}
