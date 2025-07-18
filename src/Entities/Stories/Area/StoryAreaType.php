<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories\Area;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет тип кликабельной области в истории.
 *
 * @link https://core.telegram.org/bots/api#storyareatype
 *
 * @see StoryAreaTypeLocation
 * @see StoryAreaTypeSuggestedReaction
 * @see StoryAreaTypeLink
 * @see StoryAreaTypeWeather
 * @see StoryAreaTypeUniqueGift
 */
#[Concrete]
abstract class StoryAreaType extends Entity
{
    /**
     * Локация.
     *
     * @var string
     */
    const LOCATION = 'location';

    /**
     * Реакция.
     *
     * @var string
     */
    const SUGGESTED_REACTION = 'suggested_reaction';

    /**
     * Ссылка.
     *
     * @var string
     */
    const LINK = 'link';

    /**
     * Погода.
     *
     * @var string
     */
    const WEATHER = 'weather';

    /**
     * Уникальный подарок.
     *
     * @var string
     */
    const UNIQUE_GIFT = 'unique_gift';

    # # #

    /**
     * Типы кликабельной области.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::LOCATION,
            static::SUGGESTED_REACTION,
            static::LINK,
            static::WEATHER,
            static::UNIQUE_GIFT
        ];
    }

    # # #

    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            StoryAreaType::LOCATION           => new StoryAreaTypeLocation($data),
            StoryAreaType::SUGGESTED_REACTION => new StoryAreaTypeSuggestedReaction($data),
            StoryAreaType::LINK               => new StoryAreaTypeLink($data),
            StoryAreaType::WEATHER            => new StoryAreaTypeWeather($data),
            StoryAreaType::UNIQUE_GIFT        => new StoryAreaTypeUniqueGift($data),
            default                           => null
        };
    }
}
