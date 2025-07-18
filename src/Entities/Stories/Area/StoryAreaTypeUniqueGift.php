<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories\Area;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет область истории, указывающую на уникальный подарок. В настоящее время в истории может быть не более 1 области уникального подарка.
 *
 * @link https://core.telegram.org/bots/api#storyareatypeuniquegift
 *
 * @method string getType() Тип области.
 * @method string getName() Уникальное название подарка.
 *
 * @method $this setName(string $name) Уникальное название подарка.
 */
#[Required([
    'type',
    'name'
])]
class StoryAreaTypeUniqueGift extends StoryAreaType
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = StoryAreaType::UNIQUE_GIFT;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $name
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
