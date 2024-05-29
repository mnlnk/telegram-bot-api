<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

/**
 * Представляет типы специальных сущностей сообщения.
 *
 * @link https://core.telegram.org/bots/api#messageentity
 */
abstract class MessageEntityType
{
    /**
     * Псевдоним пользователя "@username"
     *
     * @var string
     */
    const MENTION = 'mention';

    /**
     * Хештег "#hashtag".
     *
     * @var string
     */
    const HASHTAG = 'hashtag';

    /**
     * Валютный тег "$USD".
     *
     * @var string
     */
    const CASHTAG = 'cashtag';

    /**
     * Команда бота "/start@jobs_bot".
     *
     * @var string
     */
    const BOT_COMMAND = 'bot_command';

    /**
     * Url-адрес "https://telegram.org".
     *
     * @var string
     */
    const URL = 'url';

    /**
     * Электронный адрес почты "do-not-reply@telegram.org".
     *
     * @var string
     */
    const EMAIL = 'email';

    /**
     * Номер телефона "+1-212-555-0123".
     *
     * @var string
     */
    const PHONE_NUMBER = 'phone_number';

    /**
     * Жирный текст.
     *
     * @var string
     */
    const BOLD = 'bold';

    /**
     * Курсивный текст.
     *
     * @var string
     */
    const ITALIC = 'italic';

    /**
     * Подчеркнутый текст.
     *
     * @var string
     */
    const UNDERLINE = 'underline';

    /**
     * Зачеркнутый текст.
     *
     * @var string
     */
    const STRIKETHROUGH = 'strikethrough';

    /**
     * Спойлер.
     *
     * @var string
     */
    const SPOILER = 'spoiler';

    /**
     * Блочная цитата.
     *
     * @var string
     */
    const BLOCKQUOTE = 'blockquote';

    /**
     * Моноширинная строка кода.
     *
     * @var string
     */
    const CODE = 'code';

    /**
     * Моноширинный блок кода.
     *
     * @var string
     */
    const PRE = 'pre';

    /**
     * Интерактивный текстовый Url-адрес.
     *
     * @var string
     */
    const TEXT_LINK = 'text_link';

    /**
     * Пользователь без псевдонима.
     *
     * @var string
     */
    const TEXT_MENTION = 'text_mention';

    /**
     * Пользовательский эмоджи.
     *
     * @var string
     */
    const CUSTOM_EMOJI = 'custom_emoji';

    # # #

    /**
     * Типы специальных сущностей.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::MENTION,
            static::HASHTAG,
            static::CASHTAG,
            static::BOT_COMMAND,
            static::URL,
            static::EMAIL,
            static::PHONE_NUMBER,
            static::BOLD,
            static::ITALIC,
            static::UNDERLINE,
            static::STRIKETHROUGH,
            static::SPOILER,
            static::BLOCKQUOTE,
            static::CODE,
            static::PRE,
            static::TEXT_LINK,
            static::TEXT_MENTION,
            static::CUSTOM_EMOJI
        ];
    }
}
