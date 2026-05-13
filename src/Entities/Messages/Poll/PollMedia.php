<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\LivePhoto;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Animation;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Audio;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Document;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Location;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Venue;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Video;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представлять медиа в опросе.
 * В любом объекте может присутствовать не более одного необязательного поля.
 *
 * @link https://core.telegram.org/bots/api#pollmedia
 *
 * @method   Animation|null getAnimation() (+) Анимация.
 * @method       Audio|null getAudio()     (+) Аудиофайл; в настоящее время её нельзя получить в виде варианта ответа в опросе.
 * @method    Document|null getDocument()  (+) Документ; в настоящее время их нельзя получить в виде варианта ответа в опросе.
 * @method   LivePhoto|null getLivePhoto() (+) Живое фото.
 * @method    Location|null getLocation()  (+) Публичное пространство (локация), информация о котором доступна всем.
 * @method PhotoSize[]|null getPhoto()     (+) Фотография (доступные размеры фотографии).
 * @method     Sticker|null getSticker()   (+) Стикер; в настоящее время только для вариантов ответов в опросе.
 * @method       Venue|null getVenue()     (+) Место проведения (информация о площадке).
 * @method       Video|null getVideo()     (+) Видео.
 *
 * @since 10.0
 */
#[Depends([
    'animation' => Animation::class,
    'audio' => Audio::class,
    'document' => Document::class,
    'live_photo' => LivePhoto::class,
    'photo' => [PhotoSize::class],
    'sticker' => Sticker::class,
    'venue' => Venue::class,
    'video' => Video::class
])]
class PollMedia extends Entity
{
    //
}
