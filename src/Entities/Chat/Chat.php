<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Business\BusinessIntro;
use Manuylenko\Telegram\Bot\Api\Entities\Business\BusinessLocation;
use Manuylenko\Telegram\Bot\Api\Entities\Business\BusinessOpeningHours;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types\ReactionType;

/**
 * Представляет чат.
 *
 * @link https://core.telegram.org/bots/api#chat
 *
 * @method                       int getId()                                     Уникальный идентификатор чата.
 * @method                    string getType()                                   Тип чата.
 * @method               string|null getTitle()                              (+) Название; для супергрупп, каналов и групповых чатов.
 * @method               string|null getUsername()                           (+) Юзернейм пользователя; для приватных чатов, супергрупп и каналов, если они доступны.
 * @method               string|null getFirstName()                          (+) Имя собеседника в приватном чате.
 * @method               string|null getLastName()                           (+) Фамилия собеседника в приватном чате.
 * @method                 bool|null getIsForum()                            (+) Супергруппа является форумом (с включенными темами).
 * @method            ChatPhoto|null getPhoto()                              (+) Объект фото чата. Возвращается только в Api::getChat().
 * @method             string[]|null getActiveUsernames()                    (+) Список всех активных пользователей чата; для приватных чатов, супергрупп и каналов. Возвращается только в Api::getChat().
 * @method        BusinessIntro|null getBusinessIntro()                      (+) Объект бизнес-приветствия. Возвращается только в Api::getChat().
 * @method     BusinessLocation|null getBusinessLocation()                   (+) Объект местоположения бизнеса. Возвращается только в Api::getChat().
 * @method BusinessOpeningHours|null getBusinessOpeningHours()               (+) Объект часов работы бизнеса. Возвращается только в Api::getChat().
 * @method                 Chat|null getPersonalChat()                       (+) Объект чата личного канала пользователя; для приватных чатов. Возвращается только в Api::getChat().
 * @method       ReactionType[]|null getAvailableReactions()                 (+) Массив объектов доступных реакций, разрешенных в чате. Возвращается только в Api::getChat().
 * @method                  int|null getAccentColorId()                      (+) Идентификатор цвета акцента для имени чата и фона фотографии чата, заголовка ответа и предварительного просмотра ссылки. Возвращается только в Api::getChat().
 * @method               string|null getBackgroundCustomEmojiId()            (+) Пользовательский идентификатор эмоджи, выбранного чатом для заголовка ответа и фона предварительного просмотра ссылки. Возвращается только в Api::getChat().
 * @method                  int|null getProfileAccentColorId()               (+) Идентификатор акцентного цвета фона профиля чата. Возвращается только в Api::getChat().
 * @method               string|null getProfileBackgroundCustomEmojiId()     (+) Пользовательский идентификатор эмоджи, выбранного чатом для фона своего профиля. Возвращается только в Api::getChat().
 * @method               string|null getEmojiStatusCustomEmojiId()           (+) Идентификатор пользовательского смайлика статуса смайлика другой стороны в приватном чате. Возвращается только в Api::getChat().
 * @method                  int|null getEmojiStatusExpirationDate()          (+) Срок действия эмоджи-статуса собеседника в приватном чате по Unix-времени, если таковой имеется. Возвращается только в Api::getChat().
 * @method               string|null getBio()                                (+) Данные (био) собеседника в приватном чате. Возвращается только в Api::getChat().
 * @method                 bool|null getHasPrivateForwards()                 (+) Настройки конфиденциальности собеседника в приватном чате позволяют использовать ссылки tg://user?id=user_id только в чатах с пользователем. Возвращается только в Api::getChat().
 * @method                 bool|null getHasRestrictedVoiceAndVideoMessages() (+) Настройки приватности другой стороны запрещают отправку голосовых и видео-заметок в приватный чат. Возвращается только в Api::getChat().
 * @method                 bool|null getJoinToSendMessages()                 (+) Пользователям необходимо присоединиться к супергруппе, прежде чем они смогут отправлять сообщения. Возвращается только в Api::getChat().
 * @method                 bool|null getJoinByRequest()                      (+) Все пользователи, напрямую присоединяющиеся к супергруппе, должны быть одобрены администраторами супергруппы. Возвращается только в Api::getChat().
 * @method               string|null getDescription()                        (+) Описание; для групп, супергрупп и чатов каналов. Возвращается только в Api::getChat().
 * @method               string|null getInviteLink()                         (+) Основная ссылка-приглашение; для групп, супергрупп и чатов каналов. Возвращается только в Api::getChat().
 * @method              Message|null getPinnedMessage()                      (+) Объект самого последнего закрепленного сообщения (по дате отправки). Возвращается только в Api::getChat().
 * @method      ChatPermissions|null getPermissions()                        (+) Объект разрешений (прав) участников чата по умолчанию для групп и супергрупп. Возвращается только в Api::getChat().
 * @method                  int|null getSlowModeDelay()                      (+) Минимально допустимая задержка между последовательными сообщениями, отправляемыми каждым непривилегированным пользователем; в секундах. Возвращается только в Api::getChat().
 * @method                  int|null getUnrestrictBoostCount()               (+) Минимальное количество бустов, которое необходимо добавить пользователю, не являющемуся администратором, чтобы игнорировать медленный режим и разрешения чата; для супергрупп. Возвращается только в Api::getChat().
 * @method                  int|null getMessageAutoDeleteTime()              (+) Время, по истечении которого все отправленные в чат сообщения будут автоматически удаляться; в секундах. Возвращается только в Api::getChat().
 * @method                 bool|null getHasAggressiveAntiSpamEnabled()       (+) В супергруппе включены агрессивные проверки на спам. Возвращается только в Api::getChat().
 * @method                 bool|null getHasHiddenMembers()                   (+) Не администраторы могут получить только список ботов и администраторов в чате. Возвращается только в Api::getChat().
 * @method                 bool|null getHasProtectedContent()                (+) Сообщения из чата нельзя пересылать в другие чаты. Возвращается только в Api::getChat().
 * @method                 bool|null getHasVisibleHistory()                  (+) Новые участники чата имеют доступ к старым сообщениям. Возвращается только в Api::getChat().
 * @method               string|null getStickerSetName()                     (+) Название набора стикеров группы. Возвращается только в Api::getChat().
 * @method                 bool|null getCanSetStickerSet()                   (+) Бот может менять набор стикеров группы. Возвращается только в Api::getChat().
 * @method               string|null getCustomEmojiStickerSetName()          (+) Название пользовательского набора эмоджи-стикеров группы; для супергрупп. Возвращается только в Api::getChat().
 * @method                  int|null getLinkedChatId()                       (+) Уникальный идентификатор связанного чата, т.е. идентификатор группы обсуждения для канала и наоборот; для супергрупп и чатов каналов. Возвращается только в Api::getChat().
 * @method         ChatLocation|null getLocation()                           (+) Объект местоположения, к которому привязана супергруппа. Возвращается только в Api::getChat().
 */
#[Required([
    'id',
    'type'
])]
#[Depends([
    'photo' => ChatPhoto::class,
    'business_intro' => BusinessIntro::class,
    'business_location' => BusinessLocation::class,
    'business_opening_hours' => BusinessOpeningHours::class,
    'available_reactions' => [ReactionType::class],
    'pinned_message' => Message::class,
    'permissions' => ChatPermissions::class,
    'location' => ChatLocation::class
])]
class Chat extends Entity
{
    /**
     * Приватный чат (личный).
     */
    public function isPrivate(): bool
    {
        return $this->getType() == ChatType::PRIVATE;
    }

    /**
     * Группа.
     */
    public function isGroup(): bool
    {
        return $this->getType() == ChatType::GROUP;
    }

    /**
     * Супергруппа.
     */
    public function isSupergroup(): bool
    {
        return $this->getType() == ChatType::SUPERGROUP;
    }

    /**
     * Канал.
     */
    public function isChannel(): bool
    {
        return $this->getType() == ChatType::CHANNEL;
    }

    /**
     * Форум.
     */
    public function isForum(): bool
    {
        return $this->isSupergroup() && $this->getIsForum();
    }
}
