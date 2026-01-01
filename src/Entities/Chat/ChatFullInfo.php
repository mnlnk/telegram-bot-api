<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Birthdate;
use Manuylenko\Telegram\Bot\Api\Entities\Business\BusinessIntro;
use Manuylenko\Telegram\Bot\Api\Entities\Business\BusinessLocation;
use Manuylenko\Telegram\Bot\Api\Entities\Business\BusinessOpeningHours;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Gifts\AcceptedGiftTypes;
use Manuylenko\Telegram\Bot\Api\Entities\Gifts\Unique\UniqueGiftColors;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types\ReactionType;
use Manuylenko\Telegram\Bot\Api\Entities\Stars\UserRating;

/**
 * Представляет полную информацию о чате.
 *
 * @link https://core.telegram.org/bots/api#chatfullinfo
 *
 * @method                       int getId()                                     Уникальный идентификатор чата.
 * @method                    string getType()                                   Тип чата.
 * @method               string|null getTitle()                              (+) Название; для супергрупп, каналов и групповых чатов.
 * @method               string|null getUsername()                           (+) Юзернейм пользователя; для приватных чатов, супергрупп и каналов, если они доступны.
 * @method               string|null getFirstName()                          (+) Имя собеседника в приватном чате.
 * @method               string|null getLastName()                           (+) Фамилия собеседника в приватном чате.
 * @method                 bool|null getIsForum()                            (+) Супергруппа является форумом (с включенными темами).
 * @method                 bool|null getIsDirectMessages()                   (+) Чат для личных сообщений канала.
 * @method                       int getAccentColorId()                          Идентификатор цвета акцента для имени чата и фона фотографии чата, заголовка ответа и предварительного просмотра ссылки.
 * @method                       int getMaxReactionCount()                       Максимальное количество реакций, которое можно установить на сообщение в чате.
 * @method            ChatPhoto|null getPhoto()                              (+) Фото чата.
 * @method             string[]|null getActiveUsernames()                    (+) Список всех активных пользователей чата; для приватных чатов, супергрупп и каналов.
 * @method            Birthdate|null getBirthdate()                          (+) Дата рождения пользователя; для приватных чатов.
 * @method        BusinessIntro|null getBusinessIntro()                      (+) Бизнес-приветствие.
 * @method     BusinessLocation|null getBusinessLocation()                   (+) Местоположения бизнеса.
 * @method BusinessOpeningHours|null getBusinessOpeningHours()               (+) Часы работы бизнеса.
 * @method                 Chat|null getPersonalChat()                       (+) Чат личного канала пользователя; для приватных чатов.
 * @method                 Chat|null getParentChat()                         (+) Родительский чат; только для чатов личных сообщений.
 * @method       ReactionType[]|null getAvailableReactions()                 (+) Доступные реакции, разрешенные в чате.
 * @method               string|null getBackgroundCustomEmojiId()            (+) Пользовательский идентификатор эмоджи, выбранного чатом для заголовка ответа и фона предварительного просмотра ссылки.
 * @method                  int|null getProfileAccentColorId()               (+) Идентификатор акцентного цвета фона профиля чата.
 * @method               string|null getProfileBackgroundCustomEmojiId()     (+) Пользовательский идентификатор эмоджи, выбранного чатом для фона своего профиля.
 * @method               string|null getEmojiStatusCustomEmojiId()           (+) Идентификатор пользовательского смайлика статуса смайлика другой стороны в приватном чате.
 * @method                  int|null getEmojiStatusExpirationDate()          (+) Срок действия эмоджи-статуса собеседника в приватном чате по Unix-времени, если таковой имеется.
 * @method               string|null getBio()                                (+) Данные (био) собеседника в приватном чате.
 * @method                 bool|null getHasPrivateForwards()                 (+) Настройки конфиденциальности собеседника в приватном чате позволяют использовать ссылки tg://user?id=user_id только в чатах с пользователем.
 * @method                 bool|null getHasRestrictedVoiceAndVideoMessages() (+) Настройки приватности другой стороны запрещают отправку голосовых и видео-заметок в приватный чат.
 * @method                 bool|null getJoinToSendMessages()                 (+) Пользователям необходимо присоединиться к супергруппе, прежде чем они смогут отправлять сообщения.
 * @method                 bool|null getJoinByRequest()                      (+) Все пользователи, напрямую присоединяющиеся к супергруппе, должны быть одобрены администраторами супергруппы.
 * @method               string|null getDescription()                        (+) Описание чата; для групп, супергрупп и чатов каналов.
 * @method               string|null getInviteLink()                         (+) Основная ссылка-приглашение; для групп, супергрупп и чатов каналов.
 * @method              Message|null getPinnedMessage()                      (+) Последнее закрепленное сообщение (по дате отправки).
 * @method      ChatPermissions|null getPermissions()                        (+) Разрешения (права) участников чата по умолчанию; для групп и супергрупп.
 * @method         AcceptedGiftTypes getAcceptedGiftTypes()                      Типы подарков, которые принимаются чатом или пользователем; для приватных чатов.
 * @method                 bool|null getCanSendPaidMedia()                   (+) Разрешено отправлять или пересылать платные медиа-сообщения в чат канала.
 * @method                  int|null getSlowModeDelay()                      (+) Минимально допустимая задержка между последовательными сообщениями, отправляемыми каждым непривилегированным пользователем; в секундах.
 * @method                  int|null getUnrestrictBoostCount()               (+) Минимальное количество бустов, которое необходимо добавить пользователю, не являющемуся администратором, чтобы игнорировать медленный режим и разрешения чата; для супергрупп.
 * @method                  int|null getMessageAutoDeleteTime()              (+) Время, по истечении которого все отправленные в чат сообщения будут автоматически удаляться; в секундах.
 * @method                 bool|null getHasAggressiveAntiSpamEnabled()       (+) В супергруппе включены агрессивные проверки на спам.
 * @method                 bool|null getHasHiddenMembers()                   (+) Не администраторы могут получить только список ботов и администраторов в чате.
 * @method                 bool|null getHasProtectedContent()                (+) Сообщения из чата нельзя пересылать в другие чаты.
 * @method                 bool|null getHasVisibleHistory()                  (+) Новые участники чата имеют доступ к старым сообщениям.
 * @method               string|null getStickerSetName()                     (+) Название набора стикеров группы.
 * @method                 bool|null getCanSetStickerSet()                   (+) Бот может менять набор стикеров группы.
 * @method               string|null getCustomEmojiStickerSetName()          (+) Название пользовательского набора эмоджи-стикеров группы; для супергрупп.
 * @method                  int|null getLinkedChatId()                       (+) Уникальный идентификатор связанного чата, т.е. идентификатор группы обсуждения для канала и наоборот; для супергрупп и чатов каналов.
 * @method         ChatLocation|null getLocation()                           (+) Местоположение (локация), к которому привязана супергруппа.
 * @method           UserRating|null getRating()                             (+) Рейтинг пользователя, если таковой имеется (отображается личных чатах).
 * @method     UniqueGiftColors|null getUniqueGiftColors()                   (+) Цветовая схема основаная на уникальном подарке, который используется для названия чата, ответов на сообщения и предварительного просмотра ссылок.
 * @method                  int|null getPaidMessageStarCount()               (+) Количество звезд Телеграм, которое обычный пользователь должен заплатить за отправку сообщения в чат.
 */
#[Required([
    'id',
    'type',
    'accent_color_id',
    'max_reaction_count',
    'accepted_gift_types'
])]
#[Depends([
    'photo' => ChatPhoto::class,
    'birthdate' => Birthdate::class,
    'business_intro' => BusinessIntro::class,
    'business_location' => BusinessLocation::class,
    'business_opening_hours' => BusinessOpeningHours::class,
    'personal_chat' => Chat::class,
    'parent_chat' => Chat::class,
    'available_reactions' => [ReactionType::class],
    'pinned_message' => Message::class,
    'permissions' => ChatPermissions::class,
    'accepted_gift_types' => AcceptedGiftTypes::class,
    'location' => ChatLocation::class,
    'rating' => UserRating::class,
    'unique_gift_colors' => UniqueGiftColors::class
])]
class ChatFullInfo extends Entity
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
