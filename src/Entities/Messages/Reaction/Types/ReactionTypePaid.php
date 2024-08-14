<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет платную реакцию.
 *
 * @link https://core.telegram.org/bots/api#reactiontypepaid
 *
 * @method string getType() Тип реакции.
 */
#[Required([
    'type'
])]
class ReactionTypePaid extends ReactionType
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = ReactionType::PAID;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        //
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
