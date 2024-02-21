<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Content;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\LinkPreviewOptions;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет текстовое сообщение, которое будет отправлено в результате встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inputtextmessagecontent
 *
 * @method                  string getMessageText()            Текст сообщения.
 * @method             string|null getParseMode()          (+) Режим разбора специальных сущностей в тексте сообщения.
 * @method    MessageEntity[]|null getEntities()           (+) Массив объектов специальных сущностей, которые появляются в тексте сообщения.
 * @method LinkPreviewOptions|null getLinkPreviewOptions() (+) Объект параметров для создания предварительного просмотра ссылки в тексте сообщения.
 *
 * @method $this setMessageText(string $messageText)                           Текст сообщения.
 * @method $this setParseMode(string $parseMode)                               Режим разбора специальных сущностей в тексте сообщения.
 * @method $this setEntities(MessageEntity[] $entities)                        Массив объектов специальных сущностей, которые появляются в тексте сообщения.
 * @method $this setLinkPreviewOptions(LinkPreviewOptions $linkPreviewOptions) Объект параметров для создания предварительного просмотра ссылки в тексте сообщения.
 */
#[Required([
    'message_text'
])]
#[Depends([
    'entities' => [MessageEntity::class]
])]
class InputTextMessageContent extends InputMessageContent
{
    /**
     * Создает объект сущности.
     *
     * @param MessageEntity[] $entities
     */
    public static function make(
        string $messageText, // 1-4096
        ?string $parseMode = null, // ParseMode::class
        ?array $entities = null,
        ?LinkPreviewOptions $linkPreviewOptions = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
