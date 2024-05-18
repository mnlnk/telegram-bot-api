<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Fill;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет способ заливки фона на основе выбранных цветов.
 *
 * @link https://core.telegram.org/bots/api#backgroundfill
 *
 * @see BackgroundFillSolid
 * @see BackgroundFillGradient
 * @see BackgroundFillFreeformGradient
 */
#[Concrete]
abstract class BackgroundFill extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            BackgroundFillType::SOLID => new BackgroundFillSolid($data),
            BackgroundFillType::GRADIENT => new BackgroundFillGradient($data),
            BackgroundFillType::FREEFORM_GRADIENT => new BackgroundFillFreeformGradient($data),
            default => null
        };
    }
}
