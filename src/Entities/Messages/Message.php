<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Bot\ManagedBotCreated;
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
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Owner\ChatOwnerChanged;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Owner\ChatOwnerLeft;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Video\VideoChatEnded;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Video\VideoChatParticipantsInvited;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Video\VideoChatScheduled;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Video\VideoChatStarted;
use Manuylenko\Telegram\Bot\Api\Entities\Gifts\GiftInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Gifts\Unique\UniqueGiftInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist\Checklist;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist\ChecklistTasksAdded;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist\ChecklistTasksDone;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Direct\DirectMessagesTopic;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Game\Game;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\Giveaway;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\GiveawayCompleted;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\GiveawayCreated;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway\GiveawayWinners;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin\MessageOrigin;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\Poll;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\PollOptionAdded;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\PollOptionDeleted;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Replies\ExternalReplyInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Services\MessageAutoDeleteTimerChanged;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Services\ProximityAlertTriggered;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Services\WriteAccessAllowed;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\DirectMessagePriceChanged;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidMediaInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidMessagePriceChanged;
use Manuylenko\Telegram\Bot\Api\Entities\Passport\PassportData;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\Invoice;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\RefundedPayment;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\SuccessfulPayment;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;
use Manuylenko\Telegram\Bot\Api\Entities\Stories\Story;
use Manuylenko\Telegram\Bot\Api\Entities\Suggestions\SuggestedPostApprovalFailed;
use Manuylenko\Telegram\Bot\Api\Entities\Suggestions\SuggestedPostApproved;
use Manuylenko\Telegram\Bot\Api\Entities\Suggestions\SuggestedPostDeclined;
use Manuylenko\Telegram\Bot\Api\Entities\Suggestions\SuggestedPostInfo;
use Manuylenko\Telegram\Bot\Api\Entities\Suggestions\SuggestedPostPaid;
use Manuylenko\Telegram\Bot\Api\Entities\Suggestions\SuggestedPostRefunded;
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
 * @method           DirectMessagesTopic|null getDirectMessagesTopic()           (+) Тема чата личных сообщений, содержащая сообщение.
 * @method                          User|null getFrom()                          (+) Отправитель сообщения (пусто для сообщений, отправленных на каналы).
 * @method                          Chat|null getSenderChat()                    (+) Чат отправителя сообщения, отправленного от имени чата.
 * @method                           int|null getSenderBoostCount()              (+) Количество бустов, добавленных пользователем, если отправитель сообщения бустил чат.
 * @method                          User|null getSenderBusinessBot()             (+) Пользователь-бот отправивший сообщение от имени бизнес-аккаунта.
 * @method                        string|null getSenderTag()                     (+) Тег или пользовательский заголовок отправителя сообщения; только для супергрупп.
 * @method                                int getDate()                              Дата отправки сообщения (Unix).
 * @method                        string|null getGuestQueryId()                  (+) Уникальный идентификатор запроса гостя.
 * @method                        string|null getBusinessConnectionId()          (+) Уникальный идентификатор бизнес-соединения, от которого было получено сообщение.
 * @method                               Chat getChat()                              Чат, которому принадлежит сообщение.
 * @method                 MessageOrigin|null getForwardOrigin()                 (+) Исходное сообщение; для пересылаемых сообщений.
 * @method                          bool|null getIsTopicMessage()                (+) Сообщение отправлено в тему форума.
 * @method                          bool|null getIsAutomaticForward()            (+) Сообщение представляет собой публикацию канала, которая была автоматически перенаправлена в подключенную группу обсуждения.
 * @method                       Message|null getReplyToMessage()                (+) Исходное сообщение; для ответов.
 * @method             ExternalReplyInfo|null getExternalReply()                 (+) Сообщение, на которое отвечают, которое может прийти из другого чата или темы форума.
 * @method                     TextQuote|null getQuote()                         (+) Цитируемая часть сообщения; для ответов.
 * @method                         Story|null getReplyToStory()                  (+) Оригинальная история; для ответов на историю.
 * @method                           int|null getReplyToChecklistTaskId()        (+) Идентификатор конкретной задачи в чеклисте, на которую дается ответ.
 * @method                        string|null getReplyToPollOptionId()           (+) Постоянный идентификатор конкретного варианта ответа в опросе.
 * @method                          User|null getViaBot()                        (+) Пользователь (бот), через которого было отправлено сообщение.
 * @method                          User|null getGuestBotCallerUser()            (+) Пользователь, чье исходное сообщение вызвало ответ бота; для сообщения, отправленного гостевым ботом.
 * @method                          Chat|null getGuestBotCallerChat()            (+) Чат, исходное сообщение которого вызвало ответ бота; для сообщения, отправленного гостевым ботом.
 * @method                           int|null getEditDate()                      (+) Дата последнего редактирования сообщения (Unix).
 * @method                          bool|null getHasProtectedContent()           (+) Сообщение не может быть перенаправлено.
 * @method                          bool|null getIsFromOffline()                 (+) Сообщение было отправлено неявным действием, например, как бизнес-сообщение об отъезде или приветствие.
 * @method                          bool|null getIsPaidPost()                    (+) Сообщение является платным постом.
 * @method                        string|null getMediaGroupId()                  (+) Уникальный идентификатор группы мультимедийных сообщений, к которой принадлежит это сообщение.
 * @method                        string|null getAuthorSignature()               (+) Подпись автора поста для сообщений в каналах или пользовательский заголовок анонимного администратора группы.
 * @method                           int|null getPaidStarCount()                 (+) Количество звёзд Телеграм, которыми отправитель сообщения заплатил за его отправку.
 * @method                        string|null getText()                          (+) Текст сообщения в формате UTF-8; для текстовых сообщений.
 * @method               MessageEntity[]|null getEntities()                      (+) Специальные сущности; для текстовых сообщений.
 * @method            LinkPreviewOptions|null getLinkPreviewOptions()            (+) Параметры используемые для создания предварительного просмотра ссылки в сообщении.
 * @method             SuggestedPostInfo|null getSuggestedPostInfo()             (+) Параметры рекомендуемой публикации, если сообщение является рекомендуемой публикацией в чате личных сообщений канала.
 * @method                        string|null getEffectId()                      (+) Уникальный идентификатор эффекта сообщения.
 * @method                     Animation|null getAnimation()                     (+) Анимация.
 * @method                         Audio|null getAudio()                         (+) Звуковой файле (музыка).
 * @method                      Document|null getDocument()                      (+) Документ (простй файл).
 * @method                 PaidMediaInfo|null getPaidMedia()                     (+) Платный медиафайл.
 * @method                   PhotoSize[]|null getPhoto()                         (+) Фото (массив доступных размеров).
 * @method                       Sticker|null getSticker()                       (+) Стикер.
 * @method                         Story|null getStory()                         (+) История.
 * @method                         Video|null getVideo()                         (+) Видео.
 * @method                     VideoNote|null getVideoNote()                     (+) Видеозаметка (кружок).
 * @method                         Voice|null getVoice()                         (+) Голосовое сообщение.
 * @method                        string|null getCaption()                       (+) Подпись к анимации, аудио, документу, фото, видео или голосовой заметке.
 * @method               MessageEntity[]|null getCaptionEntities()               (+) Массив специальных сущностей в подписи; для сообщений с подписью.
 * @method                          bool|null getShowCaptionAboveMedia()         (+) Показывать подпись над медиа в сообщении.
 * @method                          bool|null getHasMediaSpoiler()               (+) Медиа сообщение закрыто анимацией спойлера.
 * @method                     Checklist|null getChecklist()                     (+) Контрольный список.
 * @method                       Contact|null getContact()                       (+) Телефонный контакт.
 * @method                          Dice|null getDice()                          (+) Игральная кость (кубик со случайным значением).
 * @method                          Game|null getGame()                          (+) Игра.
 * @method                          Poll|null getPoll()                          (+) Опрос.
 * @method                         Venue|null getVenue()                         (+) Месте проведения.
 * @method                      Location|null getLocation()                      (+) Местоположении (локации).
 * @method                        User[]|null getNewChatMembers()                (+) Массив новых участников, которые были добавлены в группу или супергруппу (сам бот может быть одним из этих участников).
 * @method                          User|null getLeftChatMember()                (+) Пользователь, удаленный из группы (сам бот может быть одним из этих участников).
 * @method                 ChatOwnerLeft|null getChatOwnerLeft()                 (+) Сервисное сообщение: владелец чата покинул его.
 * @method              ChatOwnerChanged|null getChatOwnerChanged()              (+) Сервисное сообщение: сменился владелец чата.
 * @method                        string|null getNewChatTitle()                  (+) Новый заголовок (название) чата.
 * @method                   PhotoSize[]|null getNewChatPhoto()                  (+) Новое фото чата (массив доступных размеров).
 * @method                          bool|null getDeleteChatPhoto()               (+) Сервисное сообщение: фото чата удалено.
 * @method                          bool|null getGroupChatCreated()              (+) Сервисное сообщение: группа создана.
 * @method                          bool|null getSupergroupChatCreated()         (+) Сервисное сообщение: супергруппа создана.
 * @method                          bool|null getChannelChatCreated()            (+) Сервисное сообщение: канал создан.
 * @method MessageAutoDeleteTimerChanged|null getMessageAutoDeleteTimerChanged() (+) Новые настройки таймера автоудаления в чате.
 * @method                           int|null getMigrateToChatId()               (+) Идентификатор супергруппы, которая была перенесена из группы.
 * @method                           int|null getMigrateFromChatId()             (+) Идентификатор группы, которая была перенесена в супергруппу.
 * @method      MaybeInaccessibleMessage|null getPinnedMessage()                 (+) Закрепленное сообщение.
 * @method                       Invoice|null getInvoice()                       (+) Счет на оплату.
 * @method             SuccessfulPayment|null getSuccessfulPayment()             (+) Подтверждение успешного платежа.
 * @method               RefundedPayment|null getRefundedPayment()               (+) Возвращаемый платеж.
 * @method                   UsersShared|null getUsersShared()                   (+) Cервисное сообщение: пользователи переданы боту.
 * @method                    ChatShared|null getChatShared()                    (+) Cервисное сообщение: чат передан боту.
 * @method                      GiftInfo|null getGift()                          (+) Cервисное сообщение: отправлен или получен обычный подарок.
 * @method                UniqueGiftInfo|null getUniqueGift()                    (+) Cервисное сообщение: отправлен или получен уникальный подарок.
 * @method                      GiftInfo|null getGiftUpgradeSent()               (+) Cервисное сообщение: после отправки подарка была приобретена услуга обновления подарочного сертификата.
 * @method                        string|null getConnectedWebsite()              (+) Доменное имя веб-сайта, на котором пользователь вошел в систему.
 * @method            WriteAccessAllowed|null getWriteAccessAllowed()            (+) Cервисное сообщение: пользователь разрешил боту, добавленному в меню вложений, писать сообщения.
 * @method                  PassportData|null getPassportData()                  (+) Телеграм Паспорт.
 * @method       ProximityAlertTriggered|null getProximityAlertTriggered()       (+) Cервисное сообщение: пользователь в чате активировал оповещение о приближении другого пользователя во время
 * @method                ChatBoostAdded|null getBoostAdded()                    (+) Cервисное сообщение: пользователь забустил чат.
 * @method                ChatBackground|null getChatBackgroundSet()             (+) Cервисное сообщение: пользователь установил фон чата.
 * @method            ChecklistTasksDone|null getChecklistTasksDone()            (+) Cервисное сообщение: некоторые задачи в контрольном списке отмечены как выполненные или невыполненные.
 * @method           ChecklistTasksAdded|null getChecklistTasksAdded()           (+) Cервисное сообщение: в контрольный список добавлены новые задачи.
 * @method     DirectMessagePriceChanged|null getDirectMessagePriceChanged()     (+) Cервисное сообщение: изменилась цена платных сообщений в соответствующем чате личных сообщений канала.
 * @method             ForumTopicCreated|null getForumTopicCreated()             (+) Cервисное сообщение: тема форума создана.
 * @method              ForumTopicEdited|null getForumTopicEdited()              (+) Cервисное сообщение: тема форума отредактирована.
 * @method              ForumTopicClosed|null getForumTopicClosed()              (+) Cервисное сообщение: тема форума закрыта.
 * @method            ForumTopicReopened|null getForumTopicReopened()            (+) Cервисное сообщение: тема форума снова открыта.
 * @method       GeneralForumTopicHidden|null getGeneralForumTopicHidden()       (+) Cервисное сообщение: основная "General" тема форума скрыта.
 * @method     GeneralForumTopicUnhidden|null getGeneralForumTopicUnhidden()     (+) Cервисное сообщение: основная "General" тема форума снова открыта.
 * @method               GiveawayCreated|null getGiveawayCreated()               (+) Cервисное сообщение: создан запланированный розыгрыш призов.
 * @method                      Giveaway|null getGiveaway()                      (+) Запланированный розыгрыш призов.
 * @method               GiveawayWinners|null getGiveawayWinners()               (+) Завершенный розыгрыш с участием публичных победителей.
 * @method             GiveawayCompleted|null getGiveawayCompleted()             (+) Cервисное сообщение: розыгрыш завершен без публичных победителей.
 * @method             ManagedBotCreated|null getManagedBotCreated()             (+) Cервисное сообщение: пользователь создал бота, которым будет управлять текущий бот.
 * @method         SuggestedPostApproved|null getSuggestedPostApproved()         (+) Cервисное сообщение: предложенный пост был одобрен.
 * @method   SuggestedPostApprovalFailed|null getSuggestedPostApprovalFailed()   (+) Cервисное сообщение: одобрение предложенного поста не удалось.
 * @method         SuggestedPostDeclined|null getSuggestedPostDeclined()         (+) Cервисное сообщение: предложенный пост был отклонен.
 * @method             SuggestedPostPaid|null getSuggestedPostPaid()             (+) Cервисное сообщение: оплата за предложенный пост была получена.
 * @method         SuggestedPostRefunded|null getSuggestedPostRefunded()         (+) Cервисное сообщение: оплата за предложенный пост возвращена.
 * @method       PaidMessagePriceChanged|null getPaidMessagePriceChanged()       (+) Cервисное сообщение: в чате изменилась стоимость платных сообщений.
 * @method               PollOptionAdded|null getPollOptionAdded()               (+) Cервисное сообщение: в опрос добавлен вариант ответа.
 * @method             PollOptionDeleted|null getPollOptionDeleted()             (+) Cервисное сообщение: вариант ответа был удален из опроса.
 * @method            VideoChatScheduled|null getVideoChatScheduled()            (+) Cервисное сообщение: видеочат запланирован.
 * @method              VideoChatStarted|null getVideoChatStarted()              (+) Cервисное сообщение: видеочат запущен.
 * @method                VideoChatEnded|null getVideoChatEnded()                (+) Cервисное сообщение: видеочат завершен.
 * @method  VideoChatParticipantsInvited|null getVideoChatParticipantsInvited()  (+) Cервисное сообщение: новые участники приглашены в видеочат.
 * @method                    WebAppData|null getWebAppData()                    (+) Данные, отправленные веб-приложением.
 * @method          InlineKeyboardMarkup|null getReplyMarkup()                   (+) Встроенная клавиатура, прикрепленная к сообщению.
 */
#[Required([
    'message_id',
    'date',
    'chat'
])]
#[Depends([
    'direct_messages_topic' => DirectMessagesTopic::class,
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
    'guest_bot_caller_user' => User::class,
    'guest_bot_caller_chat' => Chat::class,
    'entities' => [MessageEntity::class],
    'link_preview_options' => LinkPreviewOptions::class,
    'suggested_post_info' => SuggestedPostInfo::class,
    'animation' => Animation::class,
    'audio' => Audio::class,
    'document' => Document::class,
    'paid_media' => PaidMediaInfo::class,
    'photo' => [PhotoSize::class],
    'sticker' => Sticker::class,
    'story' => Story::class,
    'video' => Video::class,
    'video_note' => VideoNote::class,
    'voice' => Voice::class,
    'caption_entities' => [MessageEntity::class],
    'checklist' => Checklist::class,
    'contact' => Contact::class,
    'dice' => Dice::class,
    'game' => Game::class,
    'poll' => Poll::class,
    'venue' => Venue::class,
    'location' => Location::class,
    'new_chat_members' => [User::class],
    'left_chat_member' => User::class,
    'chat_owner_left' => ChatOwnerLeft::class,
    'chat_owner_changed' => ChatOwnerChanged::class,
    'new_chat_photo' => [PhotoSize::class],
    'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
    'pinned_message' => MaybeInaccessibleMessage::class,
    'invoice' => Invoice::class,
    'successful_payment' => SuccessfulPayment::class,
    'refunded_payment' => RefundedPayment::class,
    'users_shared' => UsersShared::class,
    'chat_shared' => ChatShared::class,
    'gift' => GiftInfo::class,
    'unique_gift' => UniqueGiftInfo::class,
    'gift_upgrade_sent' => GiftInfo::class,
    'write_access_allowed' => WriteAccessAllowed::class,
    'passport_data' => PassportData::class,
    'proximity_alert_triggered' => ProximityAlertTriggered::class,
    'boost_added' => ChatBoostAdded::class,
    'chat_background_set' => ChatBackground::class,
    'checklist_tasks_done' => ChecklistTasksDone::class,
    'checklist_tasks_added' => ChecklistTasksAdded::class,
    'direct_message_price_changed' => DirectMessagePriceChanged::class,
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
    'managed_bot_created' => ManagedBotCreated::class,
    'suggested_post_approved' => SuggestedPostApproved::class,
    'suggested_post_approval_failed' => SuggestedPostApprovalFailed::class,
    'suggested_post_declined' => SuggestedPostDeclined::class,
    'suggested_post_paid' => SuggestedPostPaid::class,
    'suggested_post_refunded' => SuggestedPostRefunded::class,
    'paid_message_price_changed' => PaidMessagePriceChanged::class,
    'poll_option_added' => PollOptionAdded::class,
    'poll_option_deleted' => PollOptionDeleted::class,
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
     * Получает команду из текста или подписи.
     */
    public function getCommand(int $offset = 0): ?string
    {
        $text = $this->getText();
        $entities = $this->getEntities();

        if ($entities === null) {
            $text = $this->getCaption();
            $entities = $this->getCaptionEntities();
        }

        if ($entities !== null) {
            foreach ($entities as $entity) {
                if ($entity->isBotCommand() && $entity->getOffset() === $offset) {
                    return substr($text, $entity->getOffset(), $entity->getLength());
                }
            }
        }

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
     * Платный медиафайл.
     */
    public function isPaidMedia(): bool
    {
        return $this->getType() == MessageType::PAID_MEDIA;
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
     * Контрольный список.
     */
    public function isChecklist(): bool
    {
        return $this->getType() == MessageType::CHECKLIST;
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
     * Сервисное сообщение о возвращенном платеже.
     */
    public function isRefundedPayment(): bool
    {
        return $this->getType() == MessageType::REFUNDED_PAYMENT;
    }

    /**
     * Закрепленное сообщение.
     */
    public function isPinnedMessage(): bool
    {
        return $this->getType() == MessageType::PINNED_MESSAGE;
    }

    /**
     * Телеграм паспорт.
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
     * Сервисное сообщение: владелец чата покинул его.
     */
    public function isChatOwnerLeft(): bool
    {
        return $this->getType() == MessageType::CHAT_OWNER_LEFT;
    }

    /**
     * Сервисное сообщение: сменился владелец чата.
     */
    public function isChatOwnerChanged(): bool
    {
        return $this->getType() == MessageType::CHAT_OWNER_CHANGED;
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
     * Сервисное сообщение: пользователи переданы боту.
     */
    public function isUsersShared(): bool
    {
        return $this->getType() == MessageType::USERS_SHARED;
    }

    /**
     * Сервисное сообщение: чат передан боту.
     */
    public function isChatShared(): bool
    {
        return $this->getType() == MessageType::CHAT_SHARED;
    }

    /**
     * Сервисное сообщение: отправлен или получен обычный подарок.
     */
    public function isGift(): bool
    {
        return $this->getType() == MessageType::GIFT;
    }

    /**
     * Сервисное сообщение: отправлен или получен уникальный подарок.
     */
    public function isUniqueGift(): bool
    {
        return $this->getType() == MessageType::UNIQUE_GIFT;
    }

    /**
     * Сервисное сообщение: после отправки подарка была приобретена услуга обновления подарочного сертификата.
     */
    public function isGiftUpgradeSent(): bool
    {
        return $this->getType() == MessageType::GIFT_UPGRADE_SENT;
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
     * Сервисное сообщение: некоторые задачи в контрольном списке были отмечены как выполненные или невыполненные.
     */
    public function isChecklistTasksDone(): bool
    {
        return $this->getType() == MessageType::CHECKLIST_TASKS_DONE;
    }

    /**
     * Сервисное сообщение: в контрольный список добавлены новые задачи.
     */
    public function isChecklistTasksAdded(): bool
    {
        return $this->getType() == MessageType::CHECKLIST_TASKS_ADDED;
    }

    /**
     * Сервисное сообщение: изменилась цена платных сообщений в соответствующем чате личных сообщений канала.
     */
    public function isDirectMessagePriceChanged(): bool
    {
        return $this->getType() == MessageType::DIRECT_MESSAGE_PRICE_CHANGED;
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
     * Завершенный розыгрыш с участием публичных победителей.
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
     * Сервисное сообщение: пользователь создал бота, которым будет управлять текущий бот.
     */
    public function isManagedBotCreated(): bool
    {
        return $this->getType() == MessageType::MANAGED_BOT_CREATED;
    }

    /**
     * Сервисное сообщение: предложенный пост был одобрен.
     */
    public function isSuggestedPostApproved(): bool
    {
        return $this->getType() == MessageType::SUGGESTED_POST_APPROVED;
    }

    /**
     * Сервисное сообщение: одобрение предложенного поста не удалось.
     */
    public function isSuggestedPostApprovalFailed(): bool
    {
        return $this->getType() == MessageType::SUGGESTED_POST_APPROVAL_FAILED;
    }

    /**
     * Сервисное сообщение: предложенный пост был отклонен.
     */
    public function isSuggestedPostDeclined(): bool
    {
        return $this->getType() == MessageType::SUGGESTED_POST_DECLINED;
    }

    /**
     * Сервисное сообщение: оплата за предложенный пост была получена.
     */
    public function isSuggestedPostPaid(): bool
    {
        return $this->getType() == MessageType::SUGGESTED_POST_PAID;
    }

    /**
     * Сервисное сообщение: оплата за предложенный пост возвращена.
     */
    public function isSuggestedPostRefunded(): bool
    {
        return $this->getType() == MessageType::SUGGESTED_POST_REFUNDED;
    }

    /**
     * Сервисное сообщение: в чате изменилась стоимость платных сообщений.
     */
    public function isPaidMessagePriceChanged(): bool
    {
        return $this->getType() == MessageType::PAID_MESSAGE_PRICE_CHANGED;
    }

    /**
     * Сервисное сообщение: в опрос добавлен вариант ответа.
     */
    public function isPollOptionAdded(): bool
    {
        return $this->getType() == MessageType::POLL_OPTION_ADDED;
    }

    /**
     * Сервисное сообщение: вариант ответа был удален из опроса.
     */
    public function isPollOptionDeleted(): bool
    {
        return $this->getType() == MessageType::POLL_OPTION_DELETED;
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
