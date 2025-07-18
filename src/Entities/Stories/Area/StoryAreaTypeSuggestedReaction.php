<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories\Area;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types\ReactionType;

/**
 * Представляет область истории, указывающую на предполагаемую реакцию. В настоящее время история может иметь до 5 предполагаемых областей реакции.
 *
 * @link https://core.telegram.org/bots/api#storyareatypesuggestedreaction
 *
 * @method       string getType()             Тип области.
 * @method ReactionType getReactionType()     Тип реакции.
 * @method    bool|null getIsDark()       (+) Область реакции имеет темный фон.
 * @method    bool|null getIsFlipped()    (+) Угол зоны реакции перевернут.
 *
 * @method $this setReactionType(ReactionType $reactionType) Тип реакции.
 * @method $this setIsDark(bool $isDark)                     Область реакции имеет темный фон.
 * @method $this setIsFlipped(bool $isFlipped)               Угол зоны реакции перевернут.
 */
#[Required([
    'type',
    'reaction_type'
])]
#[Depends([
    'reaction_type' => ReactionType::class
])]
class StoryAreaTypeSuggestedReaction extends StoryAreaType
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = StoryAreaType::SUGGESTED_REACTION;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        ReactionType $reactionType,
        ?bool $isDark = null,
        ?bool $isFlipped = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
