<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidMediaType;

/**
 * Представляет платные медиа.
 *
 * @link https://core.telegram.org/bots/api#paidmedia
 *
 * @see PaidMediaLivePhoto
 * @see PaidMediaPhoto
 * @see PaidMediaPreview
 * @see PaidMediaVideo
 */
#[Concrete]
abstract class PaidMedia extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            PaidMediaType::LIVE_PHOTO => new PaidMediaLivePhoto($data),
            PaidMediaType::PHOTO      => new PaidMediaPhoto($data),
            PaidMediaType::PREVIEW    => new PaidMediaPreview($data),
            PaidMediaType::VIDEO      => new PaidMediaVideo($data),
            default                   => null
        };
    }
}
