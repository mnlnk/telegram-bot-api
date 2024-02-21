<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет ссылку-приглашение.
 *
 * @link https://core.telegram.org/bots/api#chatinvitelink
 *
 * @method      string getInviteLink()                  Ссылка-приглашение.
 * @method        User getCreator()                     Объект пользователя (создателя ссылки).
 * @method        bool getCreatesJoinRequest()          Приглашение должно одобряться администратором чата.
 * @method        bool getIsPrimary()                   Ссылка является первичной.
 * @method        bool getIsRevoked()                   Ссылка-приглашение была отозвана.
 * @method string|null getName()                    (+) Название ссылки.
 * @method    int|null getExpireDate()              (+) Момент времени (Unix), когда срок действия ссылки истечет или уже истек.
 * @method    int|null getMemberLimit()             (+) Максимальное количество пользователей, которые могут присоединения к чату по данной ссылке-приглашению.
 * @method    int|null getPendingJoinRequestCount() (+) Количество ожидающих запросов на присоединение, созданных по этой ссылке.
 */
#[Required([
    'invite_link',
    'creator',
    'creates_join_request',
    'is_primary',
    'is_revoked'
])]
#[Depends([
    'creator' => User::class
])]
class ChatInviteLink extends Entity
{
    //
}
