<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Profile;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет устанавливаемое фото профиля.
 *
 * @link https://core.telegram.org/bots/api#inputprofilephoto
 *
 * @see InputProfilePhotoStatic
 * @see InputProfilePhotoAnimated
 */
#[Concrete]
abstract class InputProfilePhoto extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            InputProfilePhotoType::STATIC   => new InputProfilePhotoStatic($data),
            InputProfilePhotoType::ANIMATED => new InputProfilePhotoAnimated($data),
            default                         => null
        };
    }
}
