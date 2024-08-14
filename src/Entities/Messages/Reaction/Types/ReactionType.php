<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет тип реакции.
 *
 * @link https://core.telegram.org/bots/api#reactiontype
 *
 * @see ReactionTypeEmoji
 * @see ReactionTypeCustomEmoji
 */
#[Concrete]
abstract class ReactionType extends Entity
{
    /**
     * Эмоджи.
     *
     * @var string
     */
    const EMOJI = 'emoji';

    /**
     * Пользовательский эмоджи.
     *
     * @var string
     */
    const CUSTOM_EMOJI = 'custom_emoji';

    /**
     * Платная реакция.
     *
     * @var string
     */
    const PAID = 'paid';

    # # #

    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            ReactionType::EMOJI        => new ReactionTypeEmoji($data),
            ReactionType::CUSTOM_EMOJI => new ReactionTypeCustomEmoji($data),
            ReactionType::PAID         => new ReactionTypePaid($data),
            default                    => null
        };
    }

    # # #

    /**
     * Типы реакций.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::EMOJI,
            static::CUSTOM_EMOJI,
            static::PAID
        ];
    }
}
