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
 * Представляет ссылку на изображения (фото).
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
 *
 * @method                    string getType()                      Тип результата.
 * @method                    string getId()                        Уникальный идентификатор результата.
 * @method                    string getPhotoUrl()                  Url-адрес файла изображения.
 * @method                    string getThumbnailUrl()              Url-адрес миниатюры результата.
 * @method                  int|null getPhotoWidth()            (+) Ширина изображения.
 * @method                  int|null getPhotoHeight()           (+) Высота изображения.
 * @method               string|null getTitle()                 (+) Название результата.
 * @method               string|null getDescription()           (+) Короткое описание результата.
 * @method               string|null getCaption()               (+) Подпись к отправляемого изображения.
 * @method               string|null getParseMode()             (+) Режим разбора сущностей в подписи.
 * @method      MessageEntity[]|null getCaptionEntities()       (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method                 bool|null getShowCaptionAboveMedia() (+) Показывать подпись над медиа.
 * @method InlineKeyboardMarkup|null getReplyMarkup()           (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent()   (+) Объект содержимого сообщения, которое будет отправлено вместо изображения (фото).
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setPhotoUrl(string $photoUrl)                                    Url-адрес файла изображения.
 * @method $this setThumbnailUrl(string $thumbnailUrl)                            Url-адрес миниатюры результата.
 * @method $this setPhotoWidth(int $photoWidth)                                   Ширина изображения.
 * @method $this setPhotoHeight(int $photoHeight)                                 Высота изображения.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setDescription(string $description)                              Короткое описание результата.
 * @method $this setCaption(string $caption)                                      Подпись к отправляемого изображения.
 * @method $this setParseMode(string $parseMode)                                  Режим разбора сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)             Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setShowCaptionAboveMedia(bool $showCaptionAboveMedia)            Показывать подпись над медиа.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, который необходимо отправить вместо изображения (фото).
 */
#[Required([
    'type',
    'id',
    'photo_url',
    'thumbnail_url'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class],
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultPhoto extends InlineQueryResult
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
        string $photo_url,
        string $thumbnail_url,
        ?int $photo_width = null,
        ?int $photo_height = null,
        ?string $title = null,
        ?string $description = null,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
