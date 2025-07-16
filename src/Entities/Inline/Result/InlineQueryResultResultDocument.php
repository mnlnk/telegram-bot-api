<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline\Result;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Inline\InlineQueryResultType;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Content\InputMessageContent;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет ссылку на файл.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultdocument
 *
 * @method                    string getType()                    Тип результата.
 * @method                    string getId()                      Уникальный идентификатор результата.
 * @method                    string getTitle()                   Название результата.
 * @method               string|null getCaption()             (+) Подпись к отправляемому файлу.
 * @method               string|null getParseMode()           (+) Режим разбора специальных сущностей в подписи.
 * @method      MessageEntity[]|null getCaptionEntities()     (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method                    string getDocumentUrl()             Url-адрес файла.
 * @method                    string getMimeType()                Mime-тип содержимого Url-адреса.
 * @method               string|null getDescription()         (+) Короткое описание результата.
 * @method InlineKeyboardMarkup|null getReplyMarkup()         (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent() (+) Объект содержимого сообщения, которое будет отправлено вместо файла.
 * @method               string|null getThumbnailUrl()        (+) Url-адрес миниатюры файла.
 * @method                  int|null getThumbnailWidth()      (+) Ширина миниатюры.
 * @method                  int|null getThumbnailHeight()     (+) Высота миниатюры.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setCaption(string $caption)                                      Подпись к отправляемому файлу.
 * @method $this setParseMode(string $parseMode)                                  Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)             Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setDocumentUrl(string $documentUrl)                              Url-адрес файла.
 * @method $this setMimeType(string $mimeType)                                    Mime-тип содержимого Url-адреса.
 * @method $this setDescription(string $description)                              Короткое описание результата.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо файла.
 * @method $this setThumbnailUrl(string $thumbnailUrl)                            Url-адрес миниатюры файла.
 * @method $this setThumbnailWidth(int $thumbnailWidth)                           Ширина миниатюры.
 * @method $this setThumbnailHeight(int $thumbnailHeight)                         Высота миниатюры.
 */
#[Required([
    'type',
    'id',
    'title',
    'document_url',
    'mime_type'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class],
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultDocument extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::DOCUMENT;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     *
     * @param MessageEntity[] $captionEntities
     */
    public static function make(
        string $id,
        string $title,
        string $documentUrl,
        string $mimeType,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?string $description = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null,
        ?string $thumbnailUrl = null,
        ?int $thumbnailWidth = null,
        ?int $thumbnailHeight = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
