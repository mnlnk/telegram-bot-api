<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

/**
 * Представляет типы входящих обновлений.
 *
 * @link https://core.telegram.org/bots/api#update
 */
abstract class UpdateType
{
    /**
     * Новое сообщение.
     *
     * @var string
     */
    const MESSAGE = 'message';

    /**
     * Отредактированное сообщение.
     *
     * @var string
     */
    const EDITED_MESSAGE = 'edited_message';

    /**
     * Новая публикация на канале.
     *
     * @var string
     */
    const CHANNEL_POST = 'channel_post';

    /**
     * Отредактированная публикация на канале.
     *
     * @var string
     */
    const EDITED_CHANNEL_POST = 'edited_channel_post';

    /**
     * Соединение бота с бизнес-аккаунтом.
     *
     * @var string
     */
    const BUSINESS_CONNECTION = 'business_connection';

    /**
     * Изменение реакции на сообщении пользователем.
     *
     * @var string
     */
    const MESSAGE_REACTION = 'message_reaction';

    /**
     * Изменение реакции на сообщения с анонимными реакциями.
     *
     * @var string
     */
    const MESSAGE_REACTION_COUNT = 'message_reaction_count';

    /**
     * Входящий встроенный запрос.
     *
     * @var string
     */
    const INLINE_QUERY = 'inline_query';

    /**
     * Результата встроенного запроса, который был выбран пользователем.
     *
     * @var string
     */
    const CHOSEN_INLINE_RESULT = 'chosen_inline_result';

    /**
     * Входящий запрос обратного вызова.
     *
     * @var string
     */
    const CALLBACK_QUERY = 'callback_query';

    /**
     * Входящий запрос на доставку.
     *
     * @var string
     */
    const SHIPPING_QUERY = 'shipping_query';

    /**
     * Входящий запрос предварительной проверки заказа.
     *
     * @var string
     */
    const PRE_CHECKOUT_QUERY = 'pre_checkout_query';

    /**
     * Новое состояние опроса.
     *
     * @var string
     */
    const POLL = 'poll';

    /**
     * Изменение ответа пользователя в не анонимном опросе.
     *
     * @var string
     */
    const POLL_ANSWER = 'poll_answer';

    /**
     * Изменение статуса участника чата (самого бота).
     *
     * @var string
     */
    const MY_CHAT_MEMBER = 'my_chat_member';

    /**
     * Изменение статуса участника чата.
     *
     * @var string
     */
    const CHAT_MEMBER = 'chat_member';

    /**
     * Запрос на вступление в чат.
     *
     * @var string
     */
    const CHAT_JOIN_REQUEST = 'chat_join_request';

    /**
     * Добавлен или изменен буст чата.
     *
     * @var string
     */
    const CHAT_BOOST = 'chat_boost';

    /**
     * Удален буст чата.
     *
     * @var string
     */
    const REMOVED_CHAT_BOOST = 'removed_chat_boost';

    # # #

    /**
     * Типы обновлений.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::MESSAGE,
            static::EDITED_MESSAGE,
            static::CHANNEL_POST,
            static::EDITED_CHANNEL_POST,
            static::BUSINESS_CONNECTION,
            static::MESSAGE_REACTION,
            static::MESSAGE_REACTION_COUNT,
            static::INLINE_QUERY,
            static::CHOSEN_INLINE_RESULT,
            static::CALLBACK_QUERY,
            static::SHIPPING_QUERY,
            static::PRE_CHECKOUT_QUERY,
            static::POLL,
            static::POLL_ANSWER,
            static::MY_CHAT_MEMBER,
            static::CHAT_MEMBER,
            static::CHAT_JOIN_REQUEST,
            static::CHAT_BOOST,
            static::REMOVED_CHAT_BOOST
        ];
    }
}
