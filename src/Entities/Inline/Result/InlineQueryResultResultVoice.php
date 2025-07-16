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
 * Представляет ссылку на голосовую запись в контейнере (*.ogg), закодированную с помощью OPUS.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultvoice
 *
 * @method                    string getType()                    Тип результата.
 * @method                    string getId()                      Уникальный идентификатор результата.
 * @method                    string getVoiceUrl()                Url-адрес файла голосовой записи.
 * @method                    string getTitle()                   Название результата.
 * @method               string|null getCaption()             (+) Подпись к отправляемому файлу.
 * @method               string|null getParseMode()           (+) Режим разбора специальных сущностей в подписи.
 * @method      MessageEntity[]|null getCaptionEntities()     (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method                  int|null getVoiceDuration()       (+) Продолжительность голосовой записи в секундах.
 * @method InlineKeyboardMarkup|null getReplyMarkup()         (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent() (+) Объект содержимого сообщения, которое будет отправлено вместо голосовой записи.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setVoiceUrl(string $voiceUrl)                                    Url-адрес файла голосовой записи.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setCaption(string $caption)                                      Подпись к отправляемому файлу.
 * @method $this setParseMode(string $parseMode)                                  Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)             Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setVoiceDuration(int $voiceDuration)                             Продолжительность голосовой записи в секундах.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо голосовой записи.
 */
#[Required([
    'type',
    'id',
    'voice_url',
    'title'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class],
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultVoice extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::VOICE;

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
        string $voiceUrl,
        string $title,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?int $voiceDuration = null,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?InputMessageContent $inputMessageContent = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
