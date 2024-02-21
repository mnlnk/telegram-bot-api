<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query\Inline;

/**
 * Представляет типы результатов встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresult
 */
abstract class InlineQueryResultType
{
    /**
     * Статья.
     *
     * @var string
     */
    const ARTICLE = 'article';

    /**
     * Аудиофайл.
     *
     * @var string
     */
    const AUDIO = 'audio';

    /**
     * Телефонный контакт.
     *
     * @var string
     */
    const CONTACT = 'contact';

    /**
     * Документ (файл).
     *
     * @var string
     */
    const DOCUMENT = 'document';

    /**
     * Игра.
     *
     * @var string
     */
    const GAME = 'game';

    /**
     * Анимация.
     *
     * @var string
     */
    const GIF = 'gif';

    /**
     * Местоположение.
     *
     * @var string
     */
    const LOCATION = 'location';

    /**
     * Видео-анимация.
     *
     * @var string
     */
    const MPEG4_GIF = 'mpeg4_gif';

    /**
     * Изображение (фото).
     *
     * @var string
     */
    const PHOTO = 'photo';

    /**
     * Стикер.
     *
     * @var string
     */
    const STICKER = 'sticker';

    /**
     * Место проведения.
     *
     * @var string
     */
    const VENUE = 'venue';

    /**
     * Видео.
     *
     * @var string
     */
    const VIDEO = 'video';

    /**
     * Голосовая заметка.
     *
     * @var string
     */
    const VOICE = 'voice';

    # # #

    /**
     * Типы результатов встроенного запроса.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::ARTICLE,
            static::AUDIO,
            static::CONTACT,
            static::DOCUMENT,
            static::GAME,
            static::GIF,
            static::LOCATION,
            static::MPEG4_GIF,
            static::PHOTO,
            static::STICKER,
            static::VENUE,
            static::VIDEO,
            static::VOICE
        ];
    }
}
