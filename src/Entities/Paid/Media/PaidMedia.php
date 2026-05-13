<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidType;

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
            PaidType::LIVE_PHOTO => new PaidMediaLivePhoto($data),
            PaidType::PHOTO      => new PaidMediaPhoto($data),
            PaidType::PREVIEW    => new PaidMediaPreview($data),
            PaidType::VIDEO      => new PaidMediaVideo($data),
            default                   => null
        };
    }
}
