<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Input;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidMediaType;

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
            PaidMediaType::PHOTO => new InputPaidMediaPhoto($data),
            PaidMediaType::VIDEO => new InputPaidMediaVideo($data),
            default               => null
        };
    }
}
