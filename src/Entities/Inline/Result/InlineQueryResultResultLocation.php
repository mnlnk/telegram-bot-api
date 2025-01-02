<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline\Result;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Inline\Content\InputMessageContent;
use Manuylenko\Telegram\Bot\Api\Entities\Inline\InlineQueryResultType;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;

/**
 * Представляет местоположение (локацию) на карте.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
 *
 * @method                    string getType()                     Тип результата.
 * @method                    string getId()                       Уникальный идентификатор результата.
 * @method                     float getLatitude()                 Широта местоположения.
 * @method                     float getLongitude()                Долгота местоположения.
 * @method                    string getTitle()                    Название результата.
 * @method                float|null getHorizontalAccuracy()   (+) Радиус неопределенности местоположения.
 * @method                  int|null getLivePeriod()           (+) Период в секундах, в течение которого местоположение может быть обновлено.
 * @method                  int|null getHeading()              (+) Направление, в котором движется пользователь, в градусах.
 * @method                  int|null getProximityAlertRadius() (+) Максимальное расстояние для предупреждений о приближении к другому участнику чата в метрах.
 * @method InlineKeyboardMarkup|null getReplyMarkup()          (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method  InputMessageContent|null getInputMessageContent()  (+) Объект содержимого сообщения, которое будет отправлено вместо местоположения.
 * @method               string|null getThumbnailUrl()         (+) Url-адрес миниатюры результата.
 * @method                  int|null getThumbnailWidth()       (+) Ширина миниатюры.
 * @method                  int|null getThumbnailHeight()      (+) Высота миниатюры.
 *
 * @method $this setId(string $id)                                                Уникальный идентификатор результата.
 * @method $this setLatitude(float $latitude)                                     Широта местоположения.
 * @method $this setLongitude(float $longitude)                                   Долгота местоположения.
 * @method $this setTitle(string $title)                                          Название результата.
 * @method $this setHorizontalAccuracy(float $horizontalAccuracy)                 Радиус неопределенности местоположения.
 * @method $this setLivePeriod(int $livePeriod)                                   Период в секундах, в течение которого местоположение может быть обновлено.
 * @method $this setHeading(int $heading)                                         Направление, в котором движется пользователь, в градусах.
 * @method $this setProximityAlertRadius(int $proximityAlertRadius)               Максимальное расстояние для предупреждений о приближении к другому участнику чата в метрах.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup)                Объект встроенной клавиатуры, прикрепленной к сообщению.
 * @method $this setInputMessageContent(InputMessageContent $inputMessageContent) Объект содержимого сообщения, которое будет отправлено вместо местоположения.
 * @method $this setThumbnailUrl(string $thumbnailUrl)                            Url-адрес миниатюры результата.
 * @method $this setThumbnailWidth(int $thumbnailWidth)                           Ширина миниатюры.
 * @method $this setThumbnailHeight(int $thumbnailHeight)                         Высота миниатюры.
 */
#[Required([
    'type',
    'id',
    'latitude',
    'longitude',
    'title'
])]
#[Depends([
    'reply_markup' => InlineKeyboardMarkup::class,
    'input_message_content' => InputMessageContent::class
])]
class InlineQueryResultResultLocation extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::LOCATION;

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
        ?float $horizontalAccuracy = null,
        ?int $livePeriod = null,
        ?int $heading = null,
        ?int $proximityAlertRadius = null,
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
