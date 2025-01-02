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
 * Представляет ссылку на анимированный GIF-файл, хранящийся на серверах Телеграм.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 *
 * @method                    string getType()                      Тип результата.
 * @method                    string getId()                        Уникальный идентификатор результата.
 * @method                    string getGifFileId()                 Идентификатор файла.
 * @method               string|null getTitle()                 (+) Название результата.
 * @method               string|null getCaption()               (+) Подпись к отправляемому файлу анимации.
 * @method               string|null getParseMode()             (+) Режим разбора специальных сущностей в подписи.
 * @method      MessageEntity[]|null getCaptionEntities()       (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method                 bool|null getShowCaptionAboveMedia() (+) Показывать подпись над медиа.
 * @method InlineKeyboardMarkup|null getReplyMarkup()           (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent()   (+) Объект содержимого сообщения, которое будет отправлено вместо анимации.
 *
 * @method $this setId(string $id)                                                 Уникальный идентификатор результата.
 * @method $this setGifFileId(string $gifFileId)                                   Идентификатор файла.
 * @method $this setTitle(string $title)                                           Название результата.
 * @method $this setCaption(string $caption)                                       Подпись к отправляемому файлу анимации.
 * @method $this setParseMode(string $parseMode)                                   Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)              Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setShowCaptionAboveMedia(bool $showCaptionAboveMedia)             Показывать подпись над медиа.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                 Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent)  Объект содержимого сообщения, которое будет отправлено вместо анимации.
 */
#[Required([
    'type',
    'id',
    'gif_file_id'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class],
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultCachedGif extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::GIF;

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
        string $gifFileId,
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
