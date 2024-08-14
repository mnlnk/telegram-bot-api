<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Members;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет участника чата, у которого нет дополнительных привилегий или ограничений.
 *
 * @link https://core.telegram.org/bots/api#chatmembermember
 *
 * @method   string getStatus()        Статус участника чата.
 * @method     User getUser()          Объект с информацией о пользователе.
 * @method int|null getUntilDate() (+) Дата истечения срока действия подписки пользователя; Unix-время.
 */
#[Required([
    'status',
    'user'
])]
#[Depends([
    'user' => User::class
])]
class ChatMemberMember extends ChatMember
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['status'] = ChatMemberStatus::MEMBER;

        parent::__construct($data);
    }
}
