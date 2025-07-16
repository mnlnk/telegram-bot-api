<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline\Result;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Inline\InlineQueryResultType;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Content\InputMessageContent;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;

/**
 * Представляет ссылку на статью или веб-страницу.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
 *
 * @method                    string getType()                    Тип результата.
 * @method                    string getId()                      Уникальный идентификатор результата.
 * @method                    string getTitle()                   Название результата.
 * @method       InputMessageContent getInputMessageContent()     Объект содержимого сообщения, которое будет отправлено.
 * @method InlineKeyboardMarkup|null getReplyMarkup()         (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method               string|null getUrl()                 (+) Url-адрес результата.
 * @method               string|null getDescription()         (+) Короткое описание результата.
 * @method               string|null getThumbnailUrl()        (+) Url-адрес миниатюры результата.
 * @method                  int|null getThumbnailWidth()      (+) Ширина миниатюры.
 * @method                  int|null getThumbnailHeight()     (+) Высота миниатюры.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setUrl(string $url)                                              Url-адрес результата.
 * @method $this setDescription(string $description)                              Короткое описание результата.
 * @method $this setThumbnailUrl(string $thumbnailUrl)                            Url-адрес миниатюры результата.
 * @method $this setThumbnailWidth(int $thumbnailWidth)                           Ширина миниатюры.
 * @method $this setThumbnailHeight(int $thumbnailHeight)                         Высота миниатюры.
 */
#[Required([
    'type',
    'id',
    'title',
    'input_message_content'
])]
#[Depends([
    'input_message_content' => InputMessageContent::class,
    'reply_markup' => InlineKeyboardMarkup::class
])]
class InlineQueryResultResultArticle extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::ARTICLE;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $id,
        string $title,
        InputMessageContent $inputMessageContent,
        ?InlineKeyboardMarkup $replyMarkup = null,
        ?string $url = null,
        ?string $description = null,
        ?string $thumbnailUrl = null,
        ?int $thumbnailWidth = null,
        ?int $thumbnailHeight = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
