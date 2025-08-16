<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Replies;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет параметры ответа для отправляемого сообщения.
 *
 * @link https://core.telegram.org/bots/api#replyparameters
 *
 * @method                  int getMessageId()                    Идентификатор сообщения, на которое будет дан ответ в текущем или в указанном чате.
 * @method      int|string|null getChatId()                   (+) Уникальный идентификатор чата или юзернейм канала.
 * @method            bool|null getAllowSendingWithoutReply() (+) Сообщение должно быть отправлено, даже если указанное сообщение, на которое нужно ответить, не найдено.
 * @method          string|null getQuote()                    (+) Цитируемая часть сообщения, на которое необходимо ответить.
 * @method          string|null getQuoteParseMode()           (+) Режим разбора сущностей в цитате.
 * @method MessageEntity[]|null getQuoteEntities()            (+) Массив объектов специальных сущностей, которые появляются в цитате.
 * @method             int|null getQuotePosition()            (+) Позиция цитаты в исходном сообщении в UTF-16.
 * @method             int|null getChecklistTaskId()          (+) Идентификатор конкретной задачи чеклиста, на которую нужно ответить.
 *
 * @method $this setMessageId(int $messageId)                                Идентификатор сообщения, на которое будет дан ответ в текущем или в указанном чате.
 * @method $this setChatId(int|string $chatId)                               Уникальный идентификатор чата или юзернейм канала.
 * @method $this setAllowSendingWithoutReply(bool $allowSendingWithoutReply) Сообщение должно быть отправлено, даже если указанное сообщение, на которое нужно ответить, не найдено.
 * @method $this setQuote(string $quote)                                     Цитируемая часть сообщения, на которое необходимо ответить.
 * @method $this setQuoteParseMode(string $quoteParseMode)                   Режим разбора сущностей в цитате.
 * @method $this setQuoteEntities(MessageEntity[] $quoteEntities)            Массив объектов специальных сущностей, которые появляются в цитате.
 * @method $this setQuotePosition(int $quotePosition)                        Позиция цитаты в исходном сообщении в UTF-16.
 * @method $this setChecklistTaskId(int $checklistTaskId)                    Идентификатор конкретной задачи чеклиста, на которую нужно ответить.
 */
#[Required([
    'message_id'
])]
#[Depends([
    'quote_entities' => [MessageEntity::class]
])]
class ReplyParameters extends Entity
{
    /**
     * Создает объект сущности.
     *
     * @param ?MessageEntity[] $quoteEntities
     */
    public static function make(
        int $messageId,
        int|string|null $chatId = null,
        ?bool $allowSendingWithoutReply = null,
        ?string $quote = null, // 0-1024
        ?string $quoteParseMode = null, // ParseMode::class
        array|null $quoteEntities = null,
        ?int $quotePosition = null,
        ?int $checklistTaskId = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
