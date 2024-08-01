<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет платные медиа, добавленные в сообщение.
 *
 * @link https://core.telegram.org/bots/api#inputpaidmedia
 *
 * @see InputPaidMediaPhoto
 * @see InputPaidMediaVideo
 */
#[Concrete]
abstract class InputPaidMedia extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            InputMediaType::PHOTO => new InputPaidMediaPhoto($data),
            InputMediaType::VIDEO => new InputPaidMediaVideo($data),
            default               => null
        };
    }
}
