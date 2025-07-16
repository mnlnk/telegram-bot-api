<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline\Result;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Inline\InlineQueryResultType;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Content\InputMessageContent;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;

/**
 * Представляет место проведения (место встречи).
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultvenue
 *
 * @method                    string getType()                    Тип результата.
 * @method                    string getId()                      Уникальный идентификатор результата.
 * @method                     float getLatitude()                Широта места проведения.
 * @method                     float getLongitude()               Долгота места проведения.
 * @method                    string getTitle()                   Название результата.
 * @method                    string getAddress()                 Адрес места проведения.
 * @method               string|null getFoursquareId()        (+) Foursquare идентификатор места проведения.
 * @method               string|null getFoursquareType()      (+) Foursquare тип места проведения.
 * @method               string|null getGooglePlaceId()       (+) Google Places идентификатор места проведения.
 * @method               string|null getGooglePlaceType()     (+) Google Places тип места проведения.
 * @method InlineKeyboardMarkup|null getReplyMarkup()         (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent() (+) Объект содержимого сообщения, которое будет отправлено вместо места проведения.
 * @method               string|null getThumbnailUrl()        (+) Url-адрес миниатюры.
 * @method                  int|null getThumbnailWidth()      (+) Ширина миниатюры.
 * @method                  int|null getThumbnailHeight()     (+) Высота миниатюры.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setLatitude(float $latitude)                                     Широта места проведения.
 * @method $this setLongitude(float $longitude)                                   Долгота места проведения.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setAddress(string $address)                                      Адрес места проведения.
 * @method $this setFoursquareId(string $foursquareId)                            Foursquare идентификатор места проведения.
 * @method $this setFoursquareType(string $foursquareType)                        Foursquare тип места проведения.
 * @method $this setGooglePlaceId(string $googlePlaceId)                          Google Places идентификатор места проведения.
 * @method $this setGooglePlaceType(string $googlePlaceType)                      Google Places тип места проведения.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо места проведения.
 * @method $this setThumbnailUrl(string $thumbnailUrl)                            Url-адрес миниатюры.
 * @method $this setThumbnailWidth(int $thumbnailWidth)                           Ширина миниатюры.
 * @method $this setThumbnailHeight(int $thumbnailHeight)                         Высота миниатюры.
 */
#[Required([
    'type',
    'id',
    'latitude',
    'longitude',
    'title',
    'address'
])]
#[Depends([
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultVenue extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::VENUE;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $id,
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        ?string $foursquareId = null,
        ?string $foursquareType = null,
        ?string $googlePlaceId = null,
        ?string $googlePlaceType = null,
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
