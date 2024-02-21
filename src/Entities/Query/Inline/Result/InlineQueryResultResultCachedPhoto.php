<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Result;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;
use Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Content\InputMessageContent;
use Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\InlineQueryResultType;

/**
 * Представляет ссылку на изображение (фотографию), хранящуюся на серверах Телеграм.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedphoto
 *
 * @method                    string getType()                    Тип результата.
 * @method                    string getId()                      Уникальный идентификатор результата.
 * @method                    string getPhotoFileId()             Идентификатор файла.
 * @method               string|null getTitle()               (+) Название результата.
 * @method               string|null getDescription()         (+) Короткое описание результата.
 * @method               string|null getCaption()             (+) Подпись к отправляемому файлу изображения.
 * @method               string|null getParseMode()           (+) Режим разбора специальных сущностей в подписи.
 * @method      MessageEntity[]|null getCaptionEntities()     (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method InlineKeyboardMarkup|null getReplyMarkup()         (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent() (+) Объект содержимого сообщения, которое будет отправлено вместо изображения (фото).
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setPhotoFileId(string $photoFileId)                              Идентификатор файла.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setDescription(string $description)                              Короткое описание результата.
 * @method $this setCaption(string $caption)                                      Подпись к отправляемому файлу изображения.
 * @method $this setParseMode(string $parseMode)                                  Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)             Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо изображения (фото).
 */
#[Required([
    'type',
    'id',
    'photo_file_id'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class],
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultCachedPhoto extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::PHOTO;

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
        string $photoFileId,
        ?string $title,
        ?string $description,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
