<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Members;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет участника чата, который в данный момент не является участником чата (покинул), но может присоединиться к нему самостоятельно.
 *
 * @link https://core.telegram.org/bots/api#chatmemberleft
 *
 * @method string getStatus() Статус участника чата.
 * @method   User getUser()   Объект с информацией о пользователе.
 */
#[Required([
    'status',
    'user'
])]
#[Depends([
    'user' => User::class
])]
class ChatMemberLeft extends ChatMember
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['status'] = ChatMemberStatus::LEFT;

        parent::__construct($data);
    }
}
