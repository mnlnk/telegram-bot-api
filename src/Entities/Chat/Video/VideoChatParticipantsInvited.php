<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Video;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет служебное сообщение о новых участниках, приглашенных в видеочат.
 *
 * @link https://core.telegram.org/bots/api#videochatparticipantsinvited
 *
 * @method User[] getUsers() Массив объектов новых участников, приглашенных в видеочат.
 */
#[Required([
    'users'
])]
#[Depends([
	'users' => [User::class]
])]
class VideoChatParticipantsInvited extends Entity
{
    //
}
