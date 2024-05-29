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
 * Представляет ссылку на видео-анимацию (видео H.264/MPEG-4 AVC без звука).
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 *
 * @method                    string getType()                      Тип результата.
 * @method                    string getId()                        Уникальный идентификатор результата.
 * @method                    string getMpeg4Url()                  Url-адрес файла видео-анимации.
 * @method                  int|null getMpeg4Width()            (+) Ширина видео-анимации.
 * @method                  int|null getMpeg4Height()           (+) Высота видео-анимации.
 * @method                  int|null getMpeg4Duration()         (+) Продолжительность видео-анимации в секундах.
 * @method                    string getThumbnailUrl()              Url-адрес миниатюры результата.
 * @method               string|null getThumbnailMimeType()     (+) Mime-тип миниатюры результата.
 * @method               string|null getTitle()                 (+) Название результата.
 * @method               string|null getCaption()               (+) Подпись к отправляемому файлу видео-анимации.
 * @method               string|null getParseMode()             (+) Режим разбора специальных сущностей в подписи.
 * @method      MessageEntity[]|null getCaptionEntities()       (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method                 bool|null getShowCaptionAboveMedia() (+) Показывать подпись над медиа.
 * @method InlineKeyboardMarkup|null getReplyMarkup()           (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent()   (+) Объект содержимого сообщения, которое будет отправлено вместо видео-анимации.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setMpeg4Url(string $mpeg4Url)                                    Url-адрес файла видео-анимации.
 * @method $this setMpeg4Width(int $mpeg4Width)                                   Ширина видео-анимации.
 * @method $this setMpeg4Height(int $mpeg4Height)                                 Высота видео-анимации.
 * @method $this setMpeg4Duration(int $mpeg4Duration)                             Продолжительность видео-анимации в секундах.
 * @method $this setThumbnailUrl(string $thumbnailUrl)                            Url-адрес миниатюры результата.
 * @method $this setThumbnailMimeType(string $thumbnailMimeType)                  Mime-тип миниатюры результата.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setCaption(string $caption)                                      Подпись к отправляемому файлу видео-анимации.
 * @method $this setParseMode(string $parseMode)                                  Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)             Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setShowCaptionAboveMedia(bool $showCaptionAboveMedia)            Показывать подпись над медиа.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо видео-анимации.
 */
#[Required([
    'type',
    'id',
    'mpeg4_url',
    'thumbnail_url'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class],
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultMpeg4Gif extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::MPEG4_GIF;

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
        string $mpeg4Url,
        string $thumbnailUrl,
        ?int $mpeg4Width = null,
        ?int $mpeg4Height = null,
        ?int $mpeg4Duration = null,
        ?string $thumbnailMimeType = null,
        ?string $title = null,
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
