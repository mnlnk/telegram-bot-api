<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

/**
 * Представляет типы сообщений.
 *
 * @link https://core.telegram.org/bots/api#message
 */
abstract class MessageType
{
    /**
     * Текст.
     *
     * @var string
     */
    const TEXT = 'text';

    /**
     * Аудиофайл (музыка).
     *
     * @var string
     */
    const AUDIO = 'audio';

    /**
     * Анимация (видео GIF или H.264/MPEG-4 AVC без звука).
     *
     * @var string
     */
    const ANIMATION = 'animation';

    /**
     * Документ (файл).
     *
     * @var string
     */
    const DOCUMENT = 'document';

    /**
     * Платный медиафайл
     *
     * @var string
     */
    const PAID_MEDIA = 'paid_media';

    /**
     * Игра.
     *
     * @var string
     */
    const GAME = 'game';

    /**
     * Изображение.
     *
     * @var string
     */
    const PHOTO = 'photo';

    /**
     * Стикер.
     *
     * @var string
     */
    const STICKER = 'sticker';

    /**
     * Голосовая заметка.
     *
     * @var string
     */
    const VOICE = 'voice';

    /**
     * Видео-файл.
     *
     * @var string
     */
    const VIDEO = 'video';

    /**
     * Видео-заметка.
     *
     * @var string
     */
    const VIDEO_NOTE = 'video_note';

    /**
     * Телефонный контакт.
     *
     * @var string
     */
    const CONTACT = 'contact';

    /**
     * Местоположение (локация).
     *
     * @var string
     */
    const LOCATION = 'location';

    /**
     * Место проведения.
     *
     * @var string
     */
    const VENUE = 'venue';

    /**
     * Опрос.
     *
     * @var string
     */
    const POLL = 'poll';

    /**
     * Игровая кость.
     *
     * @var string
     */
    const DICE = 'dice';

    /**
     * Счет на оплату.
     *
     * @var string
     */
    const INVOICE = 'invoice';

    /**
     * Подтверждение успешного платежа.
     *
     * @var string
     */
    const SUCCESSFUL_PAYMENT = 'successful_payment';

    /**
     * Сервисное сообщение о возвращенном платеже.
     *
     * @var string
     */
    const REFUNDED_PAYMENT = 'refunded_payment';

    /**
     * Закрепленное сообщение.
     *
     * @var string
     */
    const PINNED_MESSAGE = 'pinned_message';

    /**
     * Данные телеграм паспорт.
     *
     * @var string
     */
    const PASSPORT_DATA = 'passport_data';

    /**
     * Данные веб-приложения.
     *
     * @var string
     */
    const WEB_APP_DATA = 'web_app_data';

    /**
     * Сервисное сообщение: добавлены новые участники.
     *
     * @var string
     */
    const NEW_CHAT_MEMBERS = 'new_chat_members';

    /**
     * Сервисное сообщение: пользователь покинул группу.
     *
     * @var string
     */
    const LEFT_CHAT_MEMBER = 'left_chat_member';

    /**
     * Сервисное сообщение: новый заголовок (название) чата.
     *
     * @var string
     */
    const NEW_CHAT_TITLE = 'new_chat_title';

    /**
     * Сервисное сообщение: новое фото чата.
     *
     * @var string
     */
    const NEW_CHAT_PHOTO = 'new_chat_photo';

    /**
     * Сервисное сообщение: фото чата удалено.
     *
     * @var string
     */
    const DELETE_CHAT_PHOTO = 'delete_chat_photo';

    /**
     * Сервисное сообщение: группа создана.
     *
     * @var string
     */
    const GROUP_CHAT_CREATED = 'group_chat_created';

    /**
     * Сервисное сообщение: супергруппа создана.
     *
     * @var string
     */
    const SUPERGROUP_CHAT_CREATED = 'supergroup_chat_created';

    /**
     * Сервисное сообщение: канал создан.
     *
     * @var string
     */
    const CHANNEL_CHAT_CREATED = 'channel_chat_created';

    /**
     * Сервисное сообщение: изменен таймер автоудаления.
     *
     * @var string
     */
    const MESSAGE_AUTO_DELETE_TIMER_CHANGED = 'message_auto_delete_timer_changed';

    /**
     * Сервисное сообщение: группа перенесена в супергруппу.
     *
     * @var string
     */
    const MIGRATE_TO_CHAT_ID = 'migrate_to_chat_id';

    /**
     * Сервисное сообщение: супергруппа перенесена из группы.
     *
     * @var string
     */
    const MIGRATE_FROM_CHAT_ID = 'migrate_from_chat_id';

    /**
     * Сервисное сообщение: с ботом поделились пользователями.
     *
     * @var string
     */
    const USERS_SHARED = 'users_shared';

    /**
     * Сервисное сообщение: с ботом поделились чатом.
     *
     * @var string
     */
    const CHAT_SHARED = 'chat_shared';

    /**
     * Сервисное сообщение: отправлен или получен обычный подарок.
     *
     * @var string
     */
    const GIFT = 'gift';

    /**
     * Сервисное сообщение: отправлен или получен уникальный подарок.
     *
     * @var string
     */
    const UNIQUE_GIFT = 'unique_gift';

    /**
     * Сервисное сообщение: пользователь разрешил боту, добавленному в меню вложений, писать сообщения.
     *
     * @var string
     */
    const WRITE_ACCESS_ALLOWED = 'write_access_allowed';

    /**
     * Сервисное сообщение: пользователь в чате активировал оповещение о приближении другого пользователя.
     *
     * @var string
     */
    const PROXIMITY_ALERT_TRIGGERED = 'proximity_alert_triggered';

    /**
     * Сервисное сообщение: пользователь забустил чат.
     *
     * @var string
     */
    const BOOST_ADDED = 'boost_added';

    /**
     * Сервисное сообщение: пользователь установил фон чата.
     *
     * @var string
     */
    const CHAT_BACKGROUND_SET = 'chat_background_set';

    /**
     * Сервисное сообщение: тема форума создана.
     *
     * @var string
     */
    const FORUM_TOPIC_CREATED = 'forum_topic_created';

    /**
     * Сервисное сообщение: тема форума отредактирована.
     *
     * @var string
     */
    const FORUM_TOPIC_EDITED = 'forum_topic_edited';

    /**
     * Сервисное сообщение: тема форума закрыта.
     *
     * @var string
     */
    const FORUM_TOPIC_CLOSED = 'forum_topic_closed';

    /**
     * Сервисное сообщение: тема форума снова открыта.
     *
     * @var string
     */
    const FORUM_TOPIC_REOPENED = 'forum_topic_reopened';

    /**
     * Сервисное сообщение: основная "General" тема форума скрыта.
     *
     * @var string
     */
    const GENERAL_FORUM_TOPIC_HIDDEN = 'general_forum_topic_hidden';

    /**
     * Сервисное сообщение: основная тема "General" форума снова открыта.
     *
     * @var string
     */
    const GENERAL_FORUM_TOPIC_UNHIDDEN = 'general_forum_topic_unhidden';

    /**
     * Сервисное сообщение: создан запланированный розыгрыш призов.
     *
     * @var string
     */
    const GIVEAWAY_CREATED = 'giveaway_created';

    /**
     * Запланированный розыгрыш призов.
     *
     * @var string
     */
    const GIVEAWAY = 'giveaway';

    /**
     * Завершение розыгрыша с участием публичных победителей.
     *
     * @var string
     */
    const GIVEAWAY_WINNERS = 'giveaway_winners';

    /**
     * Сервисное сообщение: розыгрыш завершен без публичных победителей.
     *
     * @var string
     */
    const GIVEAWAY_COMPLETED = 'giveaway_completed';

    /**
     * Сервисное сообщение: видеочат запланирован.
     *
     * @var string
     */
    const VIDEO_CHAT_SCHEDULED = 'video_chat_scheduled';

    /**
     * Сервисное сообщение: видеочат запущен.
     *
     * @var string
     */
    const VIDEO_CHAT_STARTED = 'video_chat_started';

    /**
     * Сервисное сообщение: видеочат завершен.
     *
     * @var string
     */
    const VIDEO_CHAT_ENDED = 'video_chat_ended';

    /**
     * Сервисное сообщение: новые участники приглашены в видеочат.
     *
     * @var string
     */
    const VIDEO_CHAT_PARTICIPANTS_INVITED = 'video_chat_participants_invited';

    /**
     * История.
     *
     * @var string
     */
    const STORY = 'story';

    # # #

    /**
     * Типы сообщений.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::TEXT,
            static::AUDIO,
            static::ANIMATION,
            static::DOCUMENT,
            static::PAID_MEDIA,
            static::GAME ,
            static::PHOTO,
            static::STICKER,
            static::VOICE,
            static::VIDEO,
            static::VIDEO_NOTE,
            static::CONTACT,
            static::LOCATION,
            static::VENUE,
            static::POLL,
            static::DICE,
            static::INVOICE,
            static::SUCCESSFUL_PAYMENT,
            static::REFUNDED_PAYMENT,
            static::PINNED_MESSAGE,
            static::PASSPORT_DATA,
            static::WEB_APP_DATA,
            static::NEW_CHAT_MEMBERS,
            static::LEFT_CHAT_MEMBER,
            static::NEW_CHAT_TITLE,
            static::NEW_CHAT_PHOTO,
            static::DELETE_CHAT_PHOTO,
            static::GROUP_CHAT_CREATED,
            static::SUPERGROUP_CHAT_CREATED,
            static::CHANNEL_CHAT_CREATED,
            static::MESSAGE_AUTO_DELETE_TIMER_CHANGED,
            static::MIGRATE_TO_CHAT_ID,
            static::MIGRATE_FROM_CHAT_ID,
            static::USERS_SHARED,
            static::CHAT_SHARED,
            static::GIFT,
            static::UNIQUE_GIFT,
            static::WRITE_ACCESS_ALLOWED,
            static::PROXIMITY_ALERT_TRIGGERED,
            static::BOOST_ADDED,
            static::CHAT_BACKGROUND_SET,
            static::FORUM_TOPIC_CREATED,
            static::FORUM_TOPIC_EDITED,
            static::FORUM_TOPIC_CLOSED,
            static::FORUM_TOPIC_REOPENED,
            static::GENERAL_FORUM_TOPIC_HIDDEN,
            static::GENERAL_FORUM_TOPIC_UNHIDDEN,
            static::GIVEAWAY_CREATED,
            static::GIVEAWAY,
            static::GIVEAWAY_WINNERS,
            static::GIVEAWAY_COMPLETED,
            static::VIDEO_CHAT_SCHEDULED,
            static::VIDEO_CHAT_STARTED,
            static::VIDEO_CHAT_ENDED,
            static::VIDEO_CHAT_PARTICIPANTS_INVITED,
            static::STORY
        ];
    }
}
