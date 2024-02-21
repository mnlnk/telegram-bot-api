<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Members;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет администратора чата.
 *
 * @link https://core.telegram.org/bots/api#chatmemberadministrator
 *
 * @method      string getStatus()                  Статус участника чата.
 * @method        User getUser()                    Объект с информацией о пользователе.
 * @method        bool getCanBeEdited()             Администратору разрешено редактировать права этого администратора.
 * @method        bool getIsAnonymous()             Присутствие администратора в чате скрыто.
 * @method        bool getCanManageChat()           Администратору разрешено управлять чатом.
 * @method        bool getCanDeleteMessages()       Администратору разрешено удалять сообщения других пользователей.
 * @method        bool getCanManageVideoChats()     Администратору разрешено управлять видеочатами.
 * @method        bool getCanRestrictMembers()      Администратору разрешено ограничивать, блокировать или разблокировать участников чата.
 * @method        bool getCanPromoteMembers()       Администратору разрешено добавлять новых администраторов с подмножеством своих собственных привилегий или понижать в должности администраторов, которых он повысил, прямо или косвенно.
 * @method        bool getCanChangeInfo()           Администратору разрешено менять название чата, фото и другие настройки.
 * @method        bool getCanInviteUsers()          Администратору разрешено приглашать новых пользователей в чат.
 * @method   bool|null getCanPostMessages()     (+) Администратору разрешено размещать сообщения в канале; только для каналов.
 * @method   bool|null getCanEditMessages()     (+) Администратору разрешено редактировать сообщения других пользователей и может ли закреплять сообщения; только для каналов.
 * @method   bool|null getCanPinMessages()      (+) Администратору разрешено закреплять сообщения; только для групп и супергрупп.
 * @method   bool|null getCanPostStories()      (+) Администратору разрешено публиковать истории в канале; только для каналов.
 * @method   bool|null getCanEditStories()      (+) Администратору разрешено редактировать истории, опубликованные другими пользователями; только для каналов.
 * @method   bool|null getCanDeleteStories()    (+) Администратору разрешено удалять истории, опубликованные другими пользователями; только для каналов.
 * @method   bool|null getCanManageTopics()     (+) Администратору разрешено создавать, переименовывать, закрывать и повторно открывать темы форума; только для супергрупп.
 * @method string|null getCustomTitle()         (+) Пользовательское название (титул) администратора.
 */
#[Required([
    'status',
    'user',
    'can_be_edited',
    'is_anonymous',
    'can_manage_chat',
    'can_delete_messages',
    'can_manage_video_chats',
    'can_restrict_members',
    'can_promote_members',
    'can_change_info',
    'can_invite_users'
])]
#[Depends([
    'user' => User::class
])]
class ChatMemberAdministrator extends ChatMember
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['status'] = ChatMemberStatus::ADMINISTRATOR;

        parent::__construct($data);
    }
}
