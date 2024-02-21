<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

/**
 * Представляет режимы разбора текста.
 *
 * @link https://core.telegram.org/bots/api#formatting-options
 */
abstract class ParseMode
{
    /**
     * Markdown.
     *
     * @link https://core.telegram.org/bots/api#markdown-style
     *
     * @var string
     */
    const MARKDOWN = 'Markdown';

    /**
     * Markdown V2.
     *
     * @link https://core.telegram.org/bots/api#markdownv2-style
     *
     * @var string
     */
    const MARKDOWN_V2 = 'MarkdownV2';

    /**
     * Html.
     *
     * @link https://core.telegram.org/bots/api#html-style
     *
     * @var string
     */
    const HTML = 'HTML';

    # # #

    /**
     * Режимы разбора текста.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::MARKDOWN,
            static::MARKDOWN_V2,
            static::HTML
        ];
    }
}
