<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет права администратора в чате.
 *
 * @link https://core.telegram.org/bots/api#chatadministratorrights
 *
 * @method      bool getIsAnonymous()                 Присутствие администратора в чате скрыто.
 * @method      bool getCanManageChat()               Администратору разрешено получать доступ к журналу событий чата, статистике чата, статистике сообщений в каналах, видеть участников канала, видеть анонимных администраторов в супергруппах и игнорировать медленный режим.
 * @method      bool getCanDeleteMessages()           Администратору разрешено удалять сообщения других пользователей.
 * @method      bool getCanManageVideoChats()         Администратору разрешено управлять видеочатами.
 * @method      bool getCanRestrictMembers()          Администратору разрешено ограничивать, запрещать или разбанивать участников чата.
 * @method      bool getCanPromoteMembers()           Администратору разрешено добавлять новых администраторов.
 * @method      bool getCanChangeInfo()               Администратору разрешено менять название чата, фото и другие настройки.
 * @method      bool getCanInviteUsers()              Администратору разрешено приглашать новых пользователей в чат.
 * @method bool|null getCanPostMessages()         (+) Администратору разрешено размещать сообщения в канале; только для каналов.
 * @method bool|null getCanEditMessages()         (+) Администратору разрешено редактировать сообщения других пользователей и закреплять сообщения; только для каналов.
 * @method bool|null getCanPinMessages()          (+) Администратору разрешено закреплять сообщения; только для групп и супергрупп.
 * @method bool|null getCanPostStories()          (+) Администратору разрешено публиковать истории в канале; только для каналов и супергрупп.
 * @method bool|null getCanEditStories()          (+) Администратору разрешено редактировать истории, опубликованные другими пользователями; только для каналов и супергрупп.
 * @method bool|null getCanDeleteStories()        (+) Администратору разрешено удалять истории, опубликованные другими пользователями; только для каналов и супергрупп.
 * @method bool|null getCanManageTopics()         (+) Администратору разрешено создавать, переименовывать, закрывать и повторно открывать темы форума; только для супергрупп.
 * @method bool|null getCanManageDirectMessages() (+) Администратору разрешено управлять личными сообщениями канала и отклонять предлагаемые публикации; только для каналов.
 *
 * @method $this setIsAnonymous(bool $isAnonymous)                         Присутствие администратора в чате скрыто.
 * @method $this setCanManageChat(bool $canManageChat)                     Администратору разрешено получать доступ к журналу событий чата, статистике чата, статистике сообщений в каналах, видеть участников канала, видеть анонимных администраторов в супергруппах и игнорировать медленный режим.
 * @method $this setCanDeleteMessages(bool $canDeleteMessages)             Администратору разрешено удалять сообщения других пользователей.
 * @method $this setCanManageVideoChats(bool $canManageVideoChats)         Администратору разрешено управлять видеочатами.
 * @method $this setCanRestrictMembers(bool $canRestrictMembers)           Администратору разрешено ограничивать, запрещать или разбанивать участников чата.
 * @method $this setCanPromoteMembers(bool $canPromoteMembers)             Администратору разрешено добавлять новых администраторов.
 * @method $this setCanChangeInfo(bool $canChangeInfo)                     Администратору разрешено менять название чата, фото и другие настройки.
 * @method $this setCanInviteUsers(bool $canInviteUsers)                   Администратору разрешено приглашать новых пользователей в чат.
 * @method $this setCanPostMessages(bool $canPostMessages)                 Администратору разрешено размещать сообщения в канале; только для каналов.
 * @method $this setCanEditMessages(bool $canEditMessages)                 Администратору разрешено редактировать сообщения других пользователей и закреплять сообщения; только для каналов.
 * @method $this setCanPinMessages(bool $canPinMessages)                   Администратору разрешено закреплять сообщения; только для групп и супергрупп.
 * @method $this setCanPostStories(bool $canPostStories)                   Администратору разрешено публиковать истории в канале; только для каналов и супергрупп.
 * @method $this setCanEditStories(bool $canEditStories)                   Администратору разрешено редактировать истории, опубликованные другими пользователями; только для каналов и супергрупп.
 * @method $this setCanDeleteStories(bool $canDeleteStories)               Администратору разрешено удалять истории, опубликованные другими пользователями; только для каналов и супергрупп.
 * @method $this setCanManageTopics(bool $canManageTopics)                 Администратору разрешено создавать, переименовывать, закрывать и повторно открывать темы форума; только для супергрупп.
 * @method $this setCanManageDirectMessages(bool $canManageDirectMessages) Администратору разрешено управлять личными сообщениями канала и отклонять предлагаемые публикации; только для каналов.
 */
#[Required([
    'is_anonymous',
    'can_manage_chat',
    'can_delete_messages',
    'can_manage_video_chats',
    'can_restrict_members',
    'can_promote_members',
    'can_change_info',
    'can_invite_users'
])]
class ChatAdministratorRights extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        bool $isAnonymous,
        bool $canManageChat,
        bool $canDeleteMessages,
        bool $canManageVideoChats,
        bool $canRestrictMembers,
        bool $canPromoteMembers,
        bool $canChangeInfo,
        bool $canInviteUsers,
        ?bool $canPostMessages = null,
        ?bool $canEditMessages = null,
        ?bool $canPinMessages = null,
        ?bool $canPostStories = null,
        ?bool $canEditStories = null,
        ?bool $canDeleteStories = null,
        ?bool $canManageTopics = null,
        ?bool $canManageDirectMessages = null
    ):static
    {
        return static::fromArgs(func_get_args());
    }
}
