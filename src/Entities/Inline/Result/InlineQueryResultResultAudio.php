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
 * Представляет ссылку на аудиофайл (*.mp3).
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultaudio
 *
 * @method                    string getType()                    Тип результата.
 * @method                    string getId()                      Уникальный идентификатор результата.
 * @method                    string getAudioUrl()                Url-адрес аудиофайла.
 * @method                    string getTitle()                   Название результата.
 * @method               string|null getCaption()             (+) Подпись к отправляемому аудиофайлу.
 * @method               string|null getParseMode()           (+) Режим разбора специальных сущностей в подписи.
 * @method      MessageEntity[]|null getCaptionEntities()     (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method               string|null getPerformer()           (+) Исполнитель.
 * @method                  int|null getAudioDuration()       (+) Продолжительность звука в секундах.
 * @method InlineKeyboardMarkup|null getReplyMarkup()         (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent() (+) Объект содержимого сообщения, которое будет отправлено вместо аудио.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setAudioUrl(string $audioUrl)                                    Url-адрес аудиофайла.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setCaption(string $caption)                                      Подпись к отправляемому аудиофайлу.
 * @method $this setParseMode(string $parseMode)                                  Режим разбора сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)             Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setPerformer(string $performer)                                  Исполнитель.
 * @method $this setAudioDuration(int $audioDuration)                             Продолжительность звука в секундах.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо аудио.
 */
#[Required([
    'type',
    'id',
    'audio_url',
    'title'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class],
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultAudio extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::AUDIO;

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
        string $audioUrl,
        string $title,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?string $performer = null,
        ?int $audioDuration = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
