<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Members;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет участника чата, который был заблокирован в чате и не может вернуться в чат или просматривать сообщения чата.
 *
 * @link https://core.telegram.org/bots/api#chatmemberbanned
 *
 * @method string getStatus()    Статус участника чата.
 * @method   User getUser()      Объект с информацией о пользователе.
 * @method    int getUntilDate() Дата снятия ограничений для этого пользователя; (Unix).
 */
#[Required([
    'status',
    'user',
    'until_date'
])]
#[Depends([
    'user' => User::class
])]
class ChatMemberBanned extends ChatMember
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['status'] = ChatMemberStatus::KICKED;

        parent::__construct($data);
    }
}
