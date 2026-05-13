<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Input\InputType;

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
            InputType::ANIMATION => new InputMediaAnimation($data),
            InputType::AUDIO     => new InputMediaAudio($data),
            InputType::DOCUMENT  => new InputMediaDocument($data),
            InputType::PHOTO     => new InputMediaPhoto($data),
            InputType::VIDEO     => new InputMediaVideo($data),
            default              => null
        };
    }
}
