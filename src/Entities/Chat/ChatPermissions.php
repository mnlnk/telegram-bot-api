<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use InvalidArgumentException;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет описание действий, которые пользователь без прав администратора может выполнять в чате.
 *
 * @link https://core.telegram.org/bots/api#chatpermissions
 *
 * @method bool|null getCanSendMessages()       (+) Пользователю разрешено отправлять текстовые сообщения, контакты, счета, местоположения и места проведения.
 * @method bool|null getCanSendAudios()         (+) Пользователю разрешено отправлять аудио.
 * @method bool|null getCanSendDocuments()      (+) Пользователю разрешено отправлять документы.
 * @method bool|null getCanSendPhotos()         (+) Пользователю разрешено отправлять фотографии.
 * @method bool|null getCanSendVideos()         (+) Пользователю разрешено отправлять видео.
 * @method bool|null getCanSendVideoNotes()     (+) Пользователю разрешено отправлять видео-заметки.
 * @method bool|null getCanSendVoiceNotes()     (+) Пользователю разрешено отправлять голосовые заметки.
 * @method bool|null getCanSendPolls()          (+) Пользователю разрешено отправлять опросы.
 * @method bool|null getCanSendOtherMessages()  (+) Пользователю разрешено отправлять анимации, игры, стикеры и использовать встроенных ботов.
 * @method bool|null getCanAddWebPagePreviews() (+) Пользователю разрешено добавлять превью веб-страницы к своим сообщениям.
 * @method bool|null getCanChangeInfo()         (+) Пользователю разрешено изменять название чата, фото и другие настройки.
 * @method bool|null getCanInviteUsers()        (+) Пользователю разрешено приглашать новых пользователей в чат.
 * @method bool|null getCanPinMessages()        (+) Пользователю разрешено закреплять сообщения.
 * @method bool|null getCanManageTopics()       (+) Пользователю разрешено создавать темы на форуме.
 *
 * @method $this setCanSendMessages(bool $canSendMessages)             Пользователю разрешено отправлять текстовые сообщения, контакты, счета, местоположения и места проведения.
 * @method $this setCanSendAudios(bool $canSendAudios)                 Пользователю разрешено отправлять аудио.
 * @method $this setCanSendDocuments(bool $canSendDocuments)           Пользователю разрешено отправлять документы.
 * @method $this setCanSendPhotos(bool $canSendPhotos)                 Пользователю разрешено отправлять фотографии.
 * @method $this setCanSendVideos(bool $canSendVideos)                 Пользователю разрешено отправлять видео.
 * @method $this setCanSendVideoNotes(bool $canSendVideoNotes)         Пользователю разрешено отправлять видео-заметки.
 * @method $this setCanSendVoiceNotes(bool $canSendVoiceNotes)         Пользователю разрешено отправлять голосовые заметки.
 * @method $this setCanSendPolls(bool $canSendPolls)                   Пользователю разрешено отправлять опросы.
 * @method $this setCanSendOtherMessages(bool $canSendOtherMessages)   Пользователю разрешено отправлять анимации, игры, стикеры и использовать встроенных ботов.
 * @method $this setCanAddWebPagePreviews(bool $canAddWebPagePreviews) Пользователю разрешено добавлять превью веб-страницы к своим сообщениям.
 * @method $this setCanChangeInfo(bool $canChangeInfo)                 Пользователю разрешено изменять название чата, фото и другие настройки.
 * @method $this setCanInviteUsers(bool $canInviteUsers)               Пользователю разрешено приглашать новых пользователей в чат.
 * @method $this setCanPinMessages(bool $canPinMessages)               Пользователю разрешено закреплять сообщения.
 * @method $this setCanManageTopics(bool $canManageTopics)             Пользователю разрешено создавать темы на форуме.
 */
class ChatPermissions extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        ?bool $canSendMessages = null,
        ?bool $canSendAudios = null,
        ?bool $canSendDocuments = null,
        ?bool $canSendPhotos = null,
        ?bool $canSendVideos = null,
        ?bool $canSendVideoNotes = null,
        ?bool $canSendVoiceNotes = null,
        ?bool $canSendPolls = null,
        ?bool $canSendOtherMessages = null,
        ?bool $canAddWebPagePreviews = null,
        ?bool $canChangeInfo = null,
        ?bool $canInviteUsers = null,
        ?bool $canPinMessages = null,
        ?bool $canManageTopics = null
    ):static
    {
        $args = func_get_args();

        if (empty($args)) {
            throw new InvalidArgumentException('Не указано ни одного разрешения');
        }

        return static::fromArgs($args);
    }
}
