<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет реакцию основанную на пользовательском эмоджи.
 *
 * @link https://core.telegram.org/bots/api#reactiontypecustomemoji
 *
 * @method string getType()          Тип реакции.
 * @method string getCustomEmojiId() Идентификатор пользовательского эмоджи.
 */
#[Required([
    'type',
    'custom_emoji_id'
])]
class ReactionTypeCustomEmoji extends ReactionType
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = ReactionType::CUSTOM_EMOJI;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $customEmojiId
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
