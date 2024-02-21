<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет реакцию основанную на эмоджи.
 *
 * @link https://core.telegram.org/bots/api#reactiontypeemoji
 *
 * @method string getType()  Тип реакции.
 * @method string getEmoji() Эмоджи реакции.
 */
#[Required([
    'type',
    'emoji'
])]
class ReactionTypeEmoji extends ReactionType
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = ReactionType::EMOJI;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $emoji
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
