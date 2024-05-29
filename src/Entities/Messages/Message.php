<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\ChatBackground;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\ChatBoostAdded;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\ChatShared;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum\ForumTopicClosed;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum\ForumTopicCreated;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum\ForumTopicEdited;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum\ForumTopicReopened;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum\GeneralForumTopicHidden;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum\GeneralForumTopicUnhidden;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Video\VideoChatEnded;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Video\VideoChatParticipantsInvited;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Video\VideoChatScheduled;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Video\VideoChatStarted;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Game\Game;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\Giveaway;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\GiveawayCompleted;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\GiveawayCreated;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\GiveawayWinners;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin\MessageOrigin;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\Poll;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Replies\ExternalReplyInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Services\MessageAutoDeleteTimerChanged;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Services\ProximityAlertTriggered;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Services\WriteAccessAllowed;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;
use Manuylenko\Telegram\Bot\Api\Entities\Passport\PassportData;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\Invoice;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\SuccessfulPayment;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;
use Manuylenko\Telegram\Bot\Api\Entities\UsersShared;
use Manuylenko\Telegram\Bot\Api\Entities\WebAppData;

/**
 * Представляет сообщение.
 *
 * @link https://core.telegram.org/bots/api#message
 *
 * @method                                int getMessageId()                         Уникальный идентификатор сообщения.
 * @method                           int|null getMessageThreadId()               (+) Уникальный идентификатор цепочки сообщений, к которой принадлежит сообщение; только для супергрупп.
 * @method                          User|null getFrom()                          (+) Объект отправителя сообщения (пусто для сообщений, отправленных на каналы).
 * @method                          Chat|null getSenderChat()                    (+) Объект чата отправителя сообщения, отправленного от имени чата.
 * @method                           int|null getSenderBoostCount()              (+) Количество бустов, добавленных пользователем, если отправитель сообщения бустил чат.
 * @method                          User|null getSenderBusinessBot()             (+) Объект пользователя-бота отправшего сообщение от имени бизнес-аккаунта.
 * @method                                int getDate()                              Дата отправки сообщения (Unix).
 * @method                        string|null getBusinessConnectionId()          (+) Уникальный идентификатор бизнес-соединения, от которого было получено сообщение.
 * @method                               Chat getChat()                              Объект чата, которому принадлежит сообщение.
 * @method                 MessageOrigin|null getForwardOrigin()                 (+) Объект с информацией об исходном сообщении для пересылаемых сообщений.
 * @method                          bool|null getIsTopicMessage()                (+) Сообщение отправлено в тему форума.
 * @method                          bool|null getIsAutomaticForward()            (+) Сообщение представляет собой публикацию канала, которая была автоматически перенаправлена в подключенную группу обсуждения.
 * @method                       Message|null getReplyToMessage()                (+) Объект исходного сообщение; для ответов.
 * @method             ExternalReplyInfo|null getExternalReply()                 (+) Объект с информацией о сообщении, на которое отвечают, которое может прийти из другого чата или темы форума.
 * @method                     TextQuote|null getQuote()                         (+) Объект цитируемой части сообщения; для ответов.
 * @method                         Story|null getReplyToStory()                  (+) Объект оригинальной истории; для ответов на историю.
 * @method                          User|null getViaBot()                        (+) Объект пользователя (бота), через которого было отправлено сообщение.
 * @method                           int|null getEditDate()                      (+) Дата последнего редактирования сообщения (Unix).
 * @method                          bool|null getHasProtectedContent()           (+) Сообщение не может быть перенаправлено.
 * @method                          bool|null getIsFromOffline()                 (+) Сообщение было отправлено неявным действием, например, как бизнес-сообщение об отъезде или приветствие.
 * @method                        string|null getMediaGroupId()                  (+) Уникальный идентификатор группы мультимедийных сообщений, к которой принадлежит это сообщение.
 * @method                        string|null getAuthorSignature()               (+) Подпись автора поста для сообщений в каналах или пользовательский заголовок анонимного администратора группы.
 * @method                        string|null getText()                          (+) Текст сообщения в формате UTF-8; для текстовых сообщений.
 * @method               MessageEntity[]|null getEntities()                      (+) Массив объектов специальных сущностей; для текстовых сообщений.
 * @method            LinkPreviewOptions|null getLinkPreviewOptions()            (+) Объект параметров, используемых для создания предварительного просмотра ссылки в сообщении.
 * @method                        string|null getEffectId()                      (+) Уникальный идентификатор эффекта сообщения.
 * @method                     Animation|null getAnimation()                     (+) Объект с информацией об анимации.
 * @method                         Audio|null getAudio()                         (+) Объект с информацией о звуковом файле.
 * @method                      Document|null getDocument()                      (+) Объект с информация о документе (простом файле).
 * @method                   PhotoSize[]|null getPhoto()                         (+) Массив объектов с информацией о фото (доступные размеры фото).
 * @method                       Sticker|null getSticker()                       (+) Объект с информацией о стикере.
 * @method                         Story|null getStory()                         (+) Объект с информацией о пересланной истории.
 * @method                         Video|null getVideo()                         (+) Объект с информацией о видео.
 * @method                     VideoNote|null getVideoNote()                     (+) Объект с информацией о видеозаметке.
 * @method                         Voice|null getVoice()                         (+) Объект с информацией о голосовом сообщении.
 * @method                        string|null getCaption()                       (+) Подпись к анимации, аудио, документу, фото, видео или голосовой заметке.
 * @method               MessageEntity[]|null getCaptionEntities()               (+) Массив объектов с информацией о специальных сущностях в подписи; для сообщений с подписью.
 * @method                          bool|null getShowCaptionAboveMedia()         (+) Показывать подпись над медиа в сообщении.
 * @method                          bool|null getHasMediaSpoiler()               (+) Медиа сообщение закрыто анимацией спойлера.
 * @method                       Contact|null getContact()                       (+) Объект с информацией о телефонном контакте.
 * @method                          Dice|null getDice()                          (+) Объект с информацией об игральной кости (кубик со случайным значением).
 * @method                          Game|null getGame()                          (+) Объект с информацией об игре.
 * @method                          Poll|null getPoll()                          (+) Объект с информацией об опросе.
 * @method                         Venue|null getVenue()                         (+) Объект с информацией о месте проведения.
 * @method                      Location|null getLocation()                      (+) Объект с информацией о местоположении (локации).
 * @method                        User[]|null getNewChatMembers()                (+) Массив объектов новых участников, которые были добавлены в группу или супергруппу (сам бот может быть одним из этих участников).
 * @method                          User|null getLeftChatMember()                (+) Объект пользователя удаленного из группы (сам бот может быть одним из этих участников).
 * @method                        string|null getNewChatTitle()                  (+) Новый заголовок (название) чата.
 * @method                   PhotoSize[]|null getNewChatPhoto()                  (+) Массив объектов новой фотографии чата (доступные размеры фото).
 * @method                          bool|null getDeleteChatPhoto()               (+) Сервисное сообщение: фото чата удалено.
 * @method                          bool|null getGroupChatCreated()              (+) Сервисное сообщение: группа создана.
 * @method                          bool|null getSupergroupChatCreated()         (+) Сервисное сообщение: супергруппа создана.
 * @method                          bool|null getChannelChatCreated()            (+) Сервисное сообщение: канал создан.
 * @method MessageAutoDeleteTimerChanged|null getMessageAutoDeleteTimerChanged() (+) Объект с информацией о новых настройках таймера автоудаления в чате.
 * @method                           int|null getMigrateToChatId()               (+) Идентификатор супергруппы, которая была перенесена из группы.
 * @method                           int|null getMigrateFromChatId()             (+) Идентификатор группы, которая была перенесена в супергруппу.
 * @method      MaybeInaccessibleMessage|null getPinnedMessage()                 (+) Объект закрепленного сообщения.
 * @method                       Invoice|null getInvoice()                       (+) Объект с информацией о счете на оплату.
 * @method             SuccessfulPayment|null getSuccessfulPayment()             (+) Объект с информацией об успешном платеже.
 * @method                   UsersShared|null getUsersShared()                   (+) Объект с информацией о пользователях, которыми поделись с ботом.
 * @method                    ChatShared|null getChatShared()                    (+) Объект чата, которым поделись с ботом.
 * @method                        string|null getConnectedWebsite()              (+) Доменное имя веб-сайта, на котором пользователь вошел в систему.
 * @method            WriteAccessAllowed|null getWriteAccessAllowed()            (+) Объект сервисного сообщения: пользователь разрешил боту, добавленному в меню вложений, писать сообщения.
 * @method                  PassportData|null getPassportData()                  (+) Объект данных Телеграм Паспорт.
 * @method       ProximityAlertTriggered|null getProximityAlertTriggered()       (+) Объект сервисного сообщения: пользователь в чате активировал оповещение о приближении другого пользователя во время
 * @method                ChatBoostAdded|null getBoostAdded()                    (+) Объект сервисного сообщения: пользователь забустил чат.
 * @method                ChatBackground|null getChatBackgroundSet()             (+) Объект сервисного сообщения: пользователь установил фон чата.
 * @method             ForumTopicCreated|null getForumTopicCreated()             (+) Объект сервисного сообщения: тема форума создана.
 * @method              ForumTopicEdited|null getForumTopicEdited()              (+) Объект сервисного сообщения: тема форума отредактирована.
 * @method              ForumTopicClosed|null getForumTopicClosed()              (+) Объект сервисного сообщения: тема форума закрыта.
 * @method            ForumTopicReopened|null getForumTopicReopened()            (+) Объект сервисного сообщения: тема форума снова открыта.
 * @method       GeneralForumTopicHidden|null getGeneralForumTopicHidden()       (+) Объект сервисного сообщения: основная "General" тема форума скрыта.
 * @method     GeneralForumTopicUnhidden|null getGeneralForumTopicUnhidden()     (+) Объект сервисного сообщения: основная "General" тема форума снова открыта.
 * @method               GiveawayCreated|null getGiveawayCreated()               (+) Объект сервисного сообщения: создан запланированный розыгрыш призов.
 * @method                      Giveaway|null getGiveaway()                      (+) Объект запланированного розыгрыша призов.
 * @method               GiveawayWinners|null getGiveawayWinners()               (+) Объект завершения розыгрыша с участием публичных победителей.
 * @method             GiveawayCompleted|null getGiveawayCompleted()             (+) Объект сервисного сообщения: розыгрыш завершен без публичных победителей.
 * @method            VideoChatScheduled|null getVideoChatScheduled()            (+) Объект сервисного сообщения: видеочат запланирован.
 * @method              VideoChatStarted|null getVideoChatStarted()              (+) Объект сервисного сообщения: видеочат запущен.
 * @method                VideoChatEnded|null getVideoChatEnded()                (+) Объект сервисного сообщения: видеочат завершен.
 * @method  VideoChatParticipantsInvited|null getVideoChatParticipantsInvited()  (+) Объект сервисного сообщения: новые участники приглашены в видеочат.
 * @method                    WebAppData|null getWebAppData()                    (+) Объект данных, отправленных веб-приложением.
 * @method          InlineKeyboardMarkup|null getReplyMarkup()                   (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 */
#[Required([
    'message_id',
    'date',
    'chat'
])]
#[Depends([
    'from' => User::class,
    'sender_chat' => Chat::class,
    'sender_business_bot' => User::class,
    'chat' => Chat::class,
    'forward_origin' => MessageOrigin::class,
    'reply_to_message' => Message::class,
    'external_reply' => ExternalReplyInfo::class,
    'quote' => TextQuote::class,
    'reply_to_story' => Story::class,
    'via_bot' => User::class,
    'entities' => [MessageEntity::class],
    'link_preview_options' => LinkPreviewOptions::class,
    'animation' => Animation::class,
    'audio' => Audio::class,
    'document' => Document::class,
    'photo' => [PhotoSize::class],
    'sticker' => Sticker::class,
    'story' => Story::class,
    'video' => Video::class,
    'video_note' => VideoNote::class,
    'voice' => Voice::class,
    'caption_entities' => [MessageEntity::class],
    'contact' => Contact::class,
    'dice' => Dice::class,
    'game' => Game::class,
    'poll' => Poll::class,
    'venue' => Venue::class,
    'location' => Location::class,
    'new_chat_members' => [User::class],
    'left_chat_member' => User::class,
    'new_chat_photo' => [PhotoSize::class],
    'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
    'pinned_message' => MaybeInaccessibleMessage::class,
    'invoice' => Invoice::class,
    'successful_payment' => SuccessfulPayment::class,
    'users_shared' => UsersShared::class,
    'chat_shared' => ChatShared::class,
    'write_access_allowed' => WriteAccessAllowed::class,
    'passport_data' => PassportData::class,
    'proximity_alert_triggered' => ProximityAlertTriggered::class,
    'boost_added' => ChatBoostAdded::class,
    'chat_background_set' => ChatBackground::class,
    'forum_topic_created' => ForumTopicCreated::class,
    'forum_topic_edited' => ForumTopicEdited::class,
    'forum_topic_closed' => ForumTopicClosed::class,
    'forum_topic_reopened' => ForumTopicReopened::class,
    'general_forum_topic_hidden' => GeneralForumTopicHidden::class,
    'general_forum_topic_unhidden' => GeneralForumTopicUnhidden::class,
    'giveaway_created' => GiveawayCreated::class,
    'giveaway' => Giveaway::class,
    'giveaway_winners' => GiveawayWinners::class,
    'giveaway_completed' => GiveawayCompleted::class,
    'video_chat_scheduled' => VideoChatScheduled::class,
    'video_chat_started' => VideoChatStarted::class,
    'video_chat_ended' => VideoChatEnded::class,
    'video_chat_participants_invited' => VideoChatParticipantsInvited::class,
    'web_app_data' => WebAppData::class,
    'reply_markup' => InlineKeyboardMarkup::class
])]
class Message extends MaybeInaccessibleMessage implements UpdateContext
{
    /**
     * Тип сообщения.
     */
    public function getType(): ?string
    {
        foreach (MessageType::all() as $type) if ($this->has($type)) return $type;

        return null;
    }

    /**
     * Текст.
     */
    public function isText(): bool
    {
        return $this->getType() == MessageType::TEXT;
    }

    /**
     * Аудио-файл.
     */
    public function isAudio(): bool
    {
        return $this->getType() == MessageType::AUDIO;
    }

    /**
     * Документ (простой файл).
     */
    public function isDocument(): bool
    {
        return $this->getType() == MessageType::DOCUMENT;
    }

    /**
     * Анимация.
     */
    public function isAnimation(): bool
    {
        return $this->getType() == MessageType::ANIMATION;
    }

    /**
     * Игра.
     */
    public function isGame(): bool
    {
        return $this->getType() == MessageType::GAME;
    }

    /**
     * Изображение (фото).
     */
    public function isPhoto(): bool
    {
        return $this->getType() == MessageType::PHOTO;
    }

    /**
     * Стикер.
     */
    public function isSticker(): bool
    {
        return $this->getType() == MessageType::STICKER;
    }

    /**
     * Голосовая заметка.
     */
    public function isVoice(): bool
    {
        return $this->getType() == MessageType::VOICE;
    }

    /**
     * Видео-файл.
     */
    public function isVideo(): bool
    {
        return $this->getType() == MessageType::VIDEO;
    }

    /**
     * Видео-заметка.
     */
    public function isVideoNote(): bool
    {
        return $this->getType() == MessageType::VIDEO_NOTE;
    }

    /**
     * Телефонный контакт.
     */
    public function isContact(): bool
    {
        return $this->getType() == MessageType::CONTACT;
    }

    /**
     * Местоположение (локация).
     */
    public function isLocation(): bool
    {
        return $this->getType() == MessageType::LOCATION;
    }

    /**
     * Место проведения (встречи).
     */
    public function isVenue(): bool
    {
        return $this->getType() == MessageType::VENUE;
    }

    /**
     * Опрос.
     */
    public function isPoll(): bool
    {
        return $this->getType() == MessageType::POLL;
    }

    /**
     * Игровая кость.
     */
    public function isDice(): bool
    {
        return $this->getType() == MessageType::DICE;
    }

    /**
     * Счет на оплату.
     */
    public function isInvoice(): bool
    {
        return $this->getType() == MessageType::INVOICE;
    }

    /**
     * Подтверждение успешного платежа.
     */
    public function isSuccessfulPayment(): bool
    {
        return $this->getType() == MessageType::SUCCESSFUL_PAYMENT;
    }

    /**
     * Закрепленное сообщение.
     */
    public function isPinnedMessage(): bool
    {
        return $this->getType() == MessageType::PINNED_MESSAGE;
    }

    /**
     * Данные телеграм паспорт.
     */
    public function isPassportData(): bool
    {
        return $this->getType() == MessageType::PASSPORT_DATA;
    }

    /**
     * Данные веб-приложения.
     */
    public function isWebAppData(): bool
    {
        return $this->getType() == MessageType::WEB_APP_DATA;
    }

    /**
     * Сервисное сообщение: добавлены новые участники.
     */
    public function isNewChatMembers(): bool
    {
        return $this->getType() == MessageType::NEW_CHAT_MEMBERS;
    }

    /**
     * Сервисное сообщение: пользователь покинул группу.
     */
    public function isLeftChatMember(): bool
    {
        return $this->getType() == MessageType::LEFT_CHAT_MEMBER;
    }

    /**
     * Сервисное сообщение: установлен новый заголовок (название) чата.
     */
    public function isNewChatTitle(): bool
    {
        return $this->getType() == MessageType::NEW_CHAT_TITLE;
    }

    /**
     * Сервисное сообщение: установлено новое фото чата.
     */
    public function isNewChatPhoto(): bool
    {
        return $this->getType() == MessageType::NEW_CHAT_PHOTO;
    }

    /**
     * Сервисное сообщение: фото чата удалено.
     */
    public function isDeleteChatPhoto(): bool
    {
        return $this->getType() == MessageType::DELETE_CHAT_PHOTO;
    }

    /**
     * Сервисное сообщение: группа создана.
     */
    public function isGroupChatCreated(): bool
    {
        return $this->getType() == MessageType::GROUP_CHAT_CREATED;
    }

    /**
     * Сервисное сообщение: супергруппа создана.
     */
    public function isSupergroupChatCreated(): bool
    {
        return $this->getType() == MessageType::SUPERGROUP_CHAT_CREATED;
    }

    /**
     * Сервисное сообщение: канал создан.
     */
    public function isChannelChatCreated(): bool
    {
        return $this->getType() == MessageType::CHANNEL_CHAT_CREATED;
    }

    /**
     * Сервисное сообщение: изменен таймер автоудаления.
     */
    public function isMessageAutoDeleteTimerChanged(): bool
    {
        return $this->getType() == MessageType::MESSAGE_AUTO_DELETE_TIMER_CHANGED;
    }

    /**
     * Сервисное сообщение: группа перенесена в супергруппу.
     */
    public function isMigrateToChatId(): bool
    {
        return $this->getType() == MessageType::MIGRATE_TO_CHAT_ID;
    }

    /**
     * Сервисное сообщение: супергруппа перенесена из группы.
     */
    public function isMigrateFromChatId(): bool
    {
        return $this->getType() == MessageType::MIGRATE_FROM_CHAT_ID;
    }

    /**
     * Сервисное сообщение: с ботом поделились пользователями.
     */
    public function isUsersShared(): bool
    {
        return $this->getType() == MessageType::USERS_SHARED;
    }

    /**
     * Сервисное сообщение: с ботом поделились чатом.
     */
    public function isChatShared(): bool
    {
        return $this->getType() == MessageType::CHAT_SHARED;
    }

    /**
     * Сервисное сообщение: пользователь разрешил боту, добавленному в меню вложений, писать сообщения.
     */
    public function isWriteAccessAllowed(): bool
    {
        return $this->getType() == MessageType::WRITE_ACCESS_ALLOWED;
    }

    /**
     * Сервисное сообщение: пользователь в чате активировал оповещение о приближении другого пользователя.
     */
    public function isProximityAlertTriggered(): bool
    {
        return $this->getType() == MessageType::PROXIMITY_ALERT_TRIGGERED;
    }

    /**
     * Сервисное сообщение: пользователь забустил чат.
     */
    public function isBoostAdded(): bool
    {
        return $this->getType() == MessageType::BOOST_ADDED;
    }

    /**
     * Сервисное сообщение: пользователь установил фон чата.
     */
    public function isChatBackgroundSet(): bool
    {
        return $this->getType() == MessageType::CHAT_BACKGROUND_SET;
    }

    /**
     * Сервисное сообщение: тема форума создана.
     */
    public function isForumTopicCreated(): bool
    {
        return $this->getType() == MessageType::FORUM_TOPIC_CREATED;
    }

    /**
     * Сервисное сообщение: тема форума отредактирована.
     */
    public function isForumTopicEdited(): bool
    {
        return $this->getType() == MessageType::FORUM_TOPIC_EDITED;
    }

    /**
     * Сервисное сообщение: тема форума закрыта.
     */
    public function isForumTopicClosed(): bool
    {
        return $this->getType() == MessageType::FORUM_TOPIC_CLOSED;
    }

    /**
     * Сервисное сообщение: тема форума снова открыта.
     */
    public function isForumTopicReopened(): bool
    {
        return $this->getType() == MessageType::FORUM_TOPIC_REOPENED;
    }

    /**
     * Сервисное сообщение: основная "General" тема форума скрыта.
     */
    public function isGeneralForumTopicHidden(): bool
    {
        return $this->getType() == MessageType::GENERAL_FORUM_TOPIC_HIDDEN;
    }

    /**
     * Сервисное сообщение: основная "General" тема форума снова открыта.
     */
    public function isGeneralForumTopicUnhidden(): bool
    {
        return $this->getType() == MessageType::GENERAL_FORUM_TOPIC_UNHIDDEN;
    }

    /**
     * Сервисное сообщение: создан запланированный розыгрыш призов.
     */
    public function isGiveawayCreated(): bool
    {
        return $this->getType() == MessageType::GIVEAWAY_CREATED;
    }

    /**
     * Запланированный розыгрыш призов.
     */
    public function isGiveaway(): bool
    {
        return $this->getType() == MessageType::GIVEAWAY;
    }

    /**
     * Завершение розыгрыша с участием публичных победителей.
     */
    public function isGiveawayWinners(): bool
    {
        return $this->getType() == MessageType::GIVEAWAY_WINNERS;
    }

    /**
     * Сервисное сообщение: розыгрыш завершен без публичных победителей.
     */
    public function isGiveawayCompleted(): bool
    {
        return $this->getType() == MessageType::GIVEAWAY_COMPLETED;
    }

    /**
     * Сервисное сообщение: видеочат запланирован.
     */
    public function isVideoChatScheduled(): bool
    {
        return $this->getType() == MessageType::VIDEO_CHAT_SCHEDULED;
    }

    /**
     * Сервисное сообщение: видеочат запущен.
     */
    public function isVideoChatStarted(): bool
    {
        return $this->getType() == MessageType::VIDEO_CHAT_STARTED;
    }

    /**
     * Сервисное сообщение: видеочат завершен.
     */
    public function isVideoChatEnded(): bool
    {
        return $this->getType() == MessageType::VIDEO_CHAT_ENDED;
    }

    /**
     * Сервисное сообщение: новые участники приглашены в видеочат.
     */
    public function isVideoChatParticipantsInvited(): bool
    {
        return $this->getType() == MessageType::VIDEO_CHAT_PARTICIPANTS_INVITED;
    }

    /**
     * История.
     */
    public function isStory(): bool
    {
        return $this->getType() == MessageType::STORY;
    }
}
