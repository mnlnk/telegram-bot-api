<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction;

/**
 * Представляет эмоджи реакций.
 *
 * @link https://core.telegram.org/bots/api#reactiontypeemoji
 */
abstract class REmoji
{
    /**
     * Эмоджи реакций.
     *
     * @return string[]
     */
    public static function all(): array
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
