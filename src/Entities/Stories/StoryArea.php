<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Stories\Area\StoryAreaType;

/**
 * Представляет интерактивную область на медиа в истории.
 *
 * @link https://core.telegram.org/bots/api#storyarea
 *
 * @method StoryAreaPosition getPosition() Положение области.
 * @method     StoryAreaType getType()     Тип области.
 *
 * @method $this setPosition(StoryAreaPosition $position) Положение области
 * @method $this setType(StoryAreaType $type)             Тип области.
 */
#[Required([
    'position',
    'type',
])]
#[Depends([
    'position' => StoryAreaPosition::class,
    'type' => StoryAreaType::class
])]
class StoryArea extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        StoryAreaPosition $position,
        StoryAreaType $type
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
