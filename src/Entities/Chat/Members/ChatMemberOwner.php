<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Members;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет владельца (создателя) чата.
 *
 * Владелец имеет все права администратора.
 *
 * @link https://core.telegram.org/bots/api#chatmemberowner
 *
 * @method      string getStatus()          Статус участника чата.
 * @method        User getUser()            Объект с информацией о пользователе.
 * @method        bool getIsAnonymous()     Присутствие владельца в чате скрыто.
 * @method string|null getCustomTitle() (+) Пользовательское название (титул) владельца.
 */
#[Required([
    'status',
    'user',
    'is_anonymous'
])]
#[Depends([
    'user' => User::class
])]
class ChatMemberOwner extends ChatMember
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['status'] = ChatMemberStatus::CREATOR;

        parent::__construct($data);
    }
}
