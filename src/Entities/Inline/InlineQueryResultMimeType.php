<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline;

/**
 * Представляет Mime-типы результатов встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresult
 */
abstract class InlineQueryResultMimeType
{
    /**
     * Веб-страница.
     *
     * @var string
     */
    const HTML = 'text/html';

    /**
     * Видео.
     *
     * @var string
     */
    const MP4 = 'video/mp4';

    /**
     * Изображение.
     *
     * @var string
     */
    const JPEG = 'image/jpeg';

    /**
     * Анимация.
     *
     * @var string
     */
    const GIF = 'image/gif';

    /**
     * Документ PDF.
     *
     * @var string
     */
    const PDF = 'application/pdf';

    /**
     * Архив.
     *
     * @var string
     */
    const ZIP = 'application/zip';

    # # #

    /**
     * Mime-типы результатов встроенного запроса.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::HTML,
            static::MP4,
            static::JPEG,
            static::GIF,
            static::PDF,
            static::ZIP
        ];
    }
}
