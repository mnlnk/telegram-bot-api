<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет содержимое отправляемого мультимедийного сообщения.
 *
 * @link https://core.telegram.org/bots/api#inputmedia
 *
 * @see InputMediaAnimation
 * @see InputMediaAudio
 * @see InputMediaDocument
 * @see InputMediaPhoto
 * @see InputMediaVideo
 */
#[Concrete]
abstract class InputMedia extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            InputMediaType::ANIMATION => new InputMediaAnimation($data),
            InputMediaType::AUDIO     => new InputMediaAudio($data),
            InputMediaType::DOCUMENT  => new InputMediaDocument($data),
            InputMediaType::PHOTO     => new InputMediaPhoto($data),
            InputMediaType::VIDEO     => new InputMediaVideo($data),
            default                   => null
        };
    }
}
