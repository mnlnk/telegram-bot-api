<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\ChatBoostRemoved;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\ChatBoostUpdated;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\ChatJoinRequest;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\ChatMemberUpdated;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\Poll;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll\PollAnswer;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\MessageReactionCountUpdated;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\MessageReactionUpdated;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\PreCheckoutQuery;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\ShippingQuery;
use Manuylenko\Telegram\Bot\Api\Entities\Query\CallbackQuery;
use Manuylenko\Telegram\Bot\Api\Entities\Query\ChosenInlineResult;
use Manuylenko\Telegram\Bot\Api\Entities\Query\InlineQuery;

/**
 * Представляет входящее обновление.
 *
 * @link https://core.telegram.org/bots/api#update
 *
 * @method                              int getUpdateId()                 Уникальный идентификатор обновления.
 * @method                     Message|null getMessage()              (+) Объект нового сообщения (текст, фото, стикер и т.д.).
 * @method                     Message|null getEditedMessage()        (+) Объект отредактированного сообщения.
 * @method                     Message|null getChannelPost()          (+) Объект новой публикации на канале (текст, фото, стикер и т.д.).
 * @method                     Message|null getEditedChannelPost()    (+) Объект отредактированной публикации на канале.
 * @method      MessageReactionUpdated|null getMessageReaction()      (+) Объект измененной реакции на сообщение.
 * @method MessageReactionCountUpdated|null getMessageReactionCount() (+) Объект измененной реакции на сообщение с анонимными реакциями.
 * @method                 InlineQuery|null getInlineQuery()          (+) Объект входящего встроенного запроса.
 * @method          ChosenInlineResult|null getChosenInlineResult()   (+) Объект результата встроенного запроса, который был выбран пользователем и отправлен его собеседнику.
 * @method               CallbackQuery|null getCallbackQuery()        (+) Объект входящего запроса обратного вызова.
 * @method               ShippingQuery|null getShippingQuery()        (+) Объект входящего запроса на доставку.
 * @method            PreCheckoutQuery|null getPreCheckoutQuery()     (+) Объект входящего запроса предварительной проверки заказа.
 * @method                        Poll|null getPoll()                 (+) Объект нового состояние опроса.
 * @method                  PollAnswer|null getPollAnswer()           (+) Объект измененного ответа пользователя в не анонимном опросе.
 * @method           ChatMemberUpdated|null getMyChatMember()         (+) Объект обновленного статуса участника чата (самого бота).
 * @method           ChatMemberUpdated|null getChatMember()           (+) Объект обновленного статуса участника чата.
 * @method             ChatJoinRequest|null getChatJoinRequest()      (+) Объект запроса на вступление в чат.
 * @method            ChatBoostUpdated|null getChatBoost()            (+) Объект добавления или измененения буста чата.
 * @method            ChatBoostRemoved|null getRemovedChatBoost()     (+) Объект удаления буста из чата.
 */
#[Required([
    'update_id'
])]
#[Depends([
    'message' => Message::class,
    'edited_message' => Message::class,
    'channel_post' => Message::class,
    'edited_channel_post' => Message::class,
    'message_reaction' => MessageReactionUpdated::class,
    'message_reaction_count' => MessageReactionCountUpdated::class,
    'inline_query' => InlineQuery::class,
    'chosen_inline_result' => ChosenInlineResult::class,
    'callback_query' => CallbackQuery::class,
    'shipping_query' => ShippingQuery::class,
    'pre_checkout_query' => PreCheckoutQuery::class,
    'poll' => Poll::class,
    'poll_answer' => PollAnswer::class,
    'my_chat_member' => ChatMemberUpdated::class,
    'chat_member' => ChatMemberUpdated::class,
    'chat_join_request' => ChatJoinRequest::class,
    'chat_boost' => ChatBoostUpdated::class,
    'removed_chat_boost' => ChatBoostRemoved::class
])]
class Update extends Entity
{
    /**
     * Тип обновления.
     */
    public function getType(): ?string
    {
        foreach (UpdateType::all() as $type) if ($this->has($type)) return $type;

        return null;
    }

    /**
     * Новое сообщение.
     */
    public function isMessage(): bool
    {
        return $this->getType() == UpdateType::MESSAGE;
    }

    /**
     * Отредактированное сообщение.
     */
    public function isEditedMessage(): bool
    {
        return $this->getType() == UpdateType::EDITED_MESSAGE;
    }

    /**
     * Новая публикация на канале.
     */
    public function isChannelPost(): bool
    {
        return $this->getType() == UpdateType::CHANNEL_POST;
    }

    /**
     * Отредактированная публикация на канале.
     */
    public function isEditedChannelPost(): bool
    {
        return $this->getType() == UpdateType::EDITED_CHANNEL_POST;
    }

    /**
     * Изменение реакции на сообщении пользователем.
     */
    public function isMessageReaction(): bool
    {
        return $this->getType() == UpdateType::MESSAGE_REACTION;
    }

    /**
     * Изменение реакции на сообщения с анонимными реакциями.
     */
    public function isMessageReactionCount(): bool
    {
        return $this->getType() == UpdateType::MESSAGE_REACTION_COUNT;
    }

    /**
     * Встроенный запрос.
     */
    public function isInlineQuery(): bool
    {
        return $this->getType() == UpdateType::INLINE_QUERY;
    }

    /**
     * Результат выбора встроенного запроса.
     */
    public function isChosenInlineResult(): bool
    {
        return $this->getType() == UpdateType::CHOSEN_INLINE_RESULT;
    }

    /**
     * Запрос обратного вызова.
     */
    public function isCallbackQuery(): bool
    {
        return $this->getType() == UpdateType::CALLBACK_QUERY;
    }

    /**
     * Запрос на доставку.
     */
    public function isShippingQuery(): bool
    {
        return $this->getType() == UpdateType::SHIPPING_QUERY;
    }

    /**
     * Запрос предварительной проверки заказа.
     */
    public function isPreCheckoutQuery(): bool
    {
        return $this->getType() == UpdateType::PRE_CHECKOUT_QUERY;
    }

    /**
     * Опрос.
     */
    public function isPoll(): bool
    {
        return $this->getType() == UpdateType::POLL;
    }

    /**
     * Ответ опроса.
     */
    public function isPollAnswer(): bool
    {
        return $this->getType() == UpdateType::POLL_ANSWER;
    }

    /**
     * Изменение статуса самого бота.
     */
    public function isMyChatMember(): bool
    {
        return $this->getType() == UpdateType::MY_CHAT_MEMBER;
    }

    /**
     * Изменение статуса участника чата.
     */
    public function isChatMember(): bool
    {
        return $this->getType() == UpdateType::CHAT_MEMBER;
    }

    /**
     * Запрос на вступление в чат.
     */
    public function isChatJoinRequest(): bool
    {
        return $this->getType() == UpdateType::CHAT_JOIN_REQUEST;
    }

    /**
     * Добавлен или изменен буст чата.
     */
    public function isChatBoost(): bool
    {
        return $this->getType() == UpdateType::CHAT_BOOST;
    }

    /**
     * Удален буст чата.
     */
    public function isRemovedChatBoost(): bool
    {
        return $this->getType() == UpdateType::REMOVED_CHAT_BOOST;
    }
}
