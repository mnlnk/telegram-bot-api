<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline\Result;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Inline\Content\InputMessageContent;
use Manuylenko\Telegram\Bot\Api\Entities\Inline\InlineQueryResultType;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет ссылку на страницу, содержащую встроенный видео-проигрыватель или видеофайл.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultvideo
 *
 * @method                    string getType()                      Тип результата.
 * @method                    string getId()                        Уникальный идентификатор результата.
 * @method                    string getVideoUrl()                  Url-адрес видео-файла.
 * @method                    string getMimeType()                  Mime-тип содержимого Url-адреса.
 * @method                    string getThumbnailUrl()              Url-адрес миниатюры результата.
 * @method                    string getTitle()                     Название результата.
 * @method               string|null getCaption()               (+) Подпись к отправляемому файлу.
 * @method               string|null getParseMode()             (+) Режим разбора специальных сущностей в подписи.
 * @method      MessageEntity[]|null getCaptionEntities()       (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method                 bool|null getShowCaptionAboveMedia() (+) Показывать подпись над медиа.
 * @method                  int|null getVideoWidth()            (+) Ширина видео.
 * @method                  int|null getVideoHeight()           (+) Высота видео.
 * @method                  int|null getVideoDuration()         (+) Продолжительность видео в секундах.
 * @method               string|null getDescription()           (+) Короткое описание результата.
 * @method InlineKeyboardMarkup|null getReplyMarkup()           (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent()   (+) Объект содержимого сообщения, которое будет отправлено вместо видео.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setVideoUrl(string $videoUrl)                                    Url-адрес видео-файла.
 * @method $this setMimeType(string $mimeType)                                    Mime-тип содержимого Url-адреса.
 * @method $this setThumbnailUrl(string $thumbnailUrl)                            Url-адрес миниатюры результата.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setCaption(string $caption)                                      Подпись к отправляемому файлу.
 * @method $this setParseMode(string $parseMode)                                  Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)             Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setShowCaptionAboveMedia(bool $showCaptionAboveMedia)            Показывать подпись над медиа.
 * @method $this setVideoWidth(int $videoWidth)                                   Ширина видео.
 * @method $this setVideoHeight(int $videoHeight)                                 Высота видео.
 * @method $this setVideoDuration(int $videoDuration)                             Продолжительность видео в секундах.
 * @method $this setDescription(string $description)                              Короткое описание результата.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо видео.
 */
#[Required([
    'type',
    'id',
    'video_url',
    'mime_type',
    'thumbnail_url',
    'title'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class],
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultVideo extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::VIDEO;

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
        string $videoUrl,
        string $mimeType,
        string $thumbnailUrl,
        string $title,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?int $videoWidth = null,
        ?int $videoHeight = null,
        ?int $videoDuration = null,
        ?string $description = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
