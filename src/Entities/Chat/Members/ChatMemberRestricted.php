<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Members;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет участника чата, на которого распространяются определенные ограничения в чате.
 *
 * Только для супергруппы.
 *
 * @link https://core.telegram.org/bots/api#chatmemberrestricted
 *
 * @method string getStatus()                Статус участника чата.
 * @method   User getUser()                  Объект с информацией о пользователе.
 * @method   bool getIsMember()              Пользователь является участником чата на момент запроса.
 * @method   bool getCanSendMessages()       Пользователю разрешено отправлять текстовые сообщения, контакты, счета, местоположения и места проведения.
 * @method   bool getCanSendAudios()         Пользователю разрешено отправлять аудио.
 * @method   bool getCanSendDocuments()      Пользователю разрешено отправлять документы.
 * @method   bool getCanSendPhotos()         Пользователю разрешено отправлять фотографии.
 * @method   bool getCanSendVideos()         Пользователю разрешено отправлять видео.
 * @method   bool getCanSendVideoNotes()     Пользователю разрешено отправлять видео-заметки.
 * @method   bool getCanSendVoiceNotes()     Пользователю разрешено отправлять голосовые заметки.
 * @method   bool getCanSendPolls()          Пользователю разрешено отправлять опросы.
 * @method   bool getCanSendOtherMessages()  Пользователю разрешено отправлять анимации, игры, стикеры и использовать встроенных ботов.
 * @method   bool getCanAddWebPagePreviews() Пользователю разрешено добавлять превью веб-страницы к своим сообщениям.
 * @method   bool getCanChangeInfo()         Пользователю разрешено изменять название чата, фото и другие настройки.
 * @method   bool getCanInviteUsers()        Пользователю разрешено приглашать новых пользователей в чат.
 * @method   bool getCanPinMessages()        Пользователю разрешено закреплять сообщения.
 * @method   bool getCanManageTopics()       Пользователю разрешено создавать темы на форуме.
 * @method    int getUntilDate()             Дата снятия ограничений для этого пользователя; (Unix). Если 0, то пользователь забанен навсегда.
 */
#[Required([
    'status',
    'user',
    'is_member',
    'can_send_messages',
    'can_send_audios',
    'can_send_documents',
    'can_send_photos',
    'can_send_videos',
    'can_send_video_notes',
    'can_send_voice_notes',
    'can_send_polls',
    'can_send_other_messages',
    'can_add_web_page_previews',
    'can_change_info',
    'can_invite_users',
    'can_pin_messages',
    'can_manage_topics',
    'until_date'
])]
#[Depends([
    'user' => User::class
])]
class ChatMemberRestricted extends ChatMember
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['status'] = ChatMemberStatus::RESTRICTED;

        parent::__construct($data);
    }
}
