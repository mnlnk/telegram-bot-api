<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Media\InputMedia;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Media\InputMediaAnimation;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Media\InputMediaLivePhoto;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Media\InputMediaLocation;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Media\InputMediaPhoto;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Media\InputMediaSticker;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Media\InputMediaVenue;
use Manuylenko\Telegram\Bot\Api\Entities\Input\Media\InputMediaVideo;

/**
 * Представляет содержимое варианта ответа в опросе.
 *
 * @link https://core.telegram.org/bots/api#inputpolloptionmedia
 *
 * @see InputMediaAnimation
 * @see InputMediaLivePhoto
 * @see InputMediaLocation
 * @see InputMediaPhoto
 * @see InputMediaSticker
 * @see InputMediaVenue
 * @see InputMediaVideo
 *
 * @since 10.0
 */
#[Concrete]
abstract class InputPollOptionMedia extends InputMedia
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return parent::getConcrete($data);
    }
}
