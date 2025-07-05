<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction;

/**
 * Представляет эмоджи реакций.
 *
 * @link https://core.telegram.org/bots/api#reactiontypeemoji
 */
abstract class ReactionEmoji
{
    /**
     * Набор доступных эмоджи реакций.
     *
     * @return string[]
     */
    public static function getAvailable(): array
    {
        return [
            '👍', '👎', '❤', '🔥', '🥰', '👏', '😁', '🤔', '🤯', '😱',
            '🤬', '😢', '🎉', '🤩', '🤮', '💩', '🙏', '👌', '🕊', '🤡',
            '🥱', '🥴', '😍', '🐳', '❤‍🔥', '🌚', '🌭', '💯', '🤣', '⚡',
            '🍌', '🏆', '💔', '🤨', '😐', '🍓', '🍾', '💋', '🖕', '😈',
            '😴', '😭', '🤓', '👻', '👨‍💻', '👀', '🎃', '🙈', '😇', '😨',
            '🤝', '✍', '🤗', '🫡', '🎅', '🎄', '☃', '💅', "🤪", '🗿',
            '🆒', '💘', '🙉', '🦄', '😘', '💊', '🙊', '😎', '👾', '🤷‍♂',
            '🤷', '🤷‍♀', '😡'
        ];
    }
}
