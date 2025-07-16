<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

/**
 * Представляет типы содержимого мультимедийных сообщений.
 *
 * @link https://core.telegram.org/bots/api#inputmedia
 */
abstract class InputMediaType
{
    /**
     * Изображение (фото).
     *
     * @var string
     */
    const PHOTO = 'photo';

    /**
     * Видео.
     *
     * @var string
     */
    const VIDEO = 'video';

    /**
     * Анимация.
     *
     * @var string
     */
    const ANIMATION = 'animation';

    /**
     * Аудио-файл.
     *
     * @var string
     */
    const AUDIO = 'audio';

    /**
     * Документ (простой файл).
     *
     * @var string
     */
    const DOCUMENT = 'document';

    # # #

    /**
     * Типы содержимого мультимедийных сообщений.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::PHOTO,
            static::VIDEO,
            static::ANIMATION,
            static::AUDIO,
            static::DOCUMENT
        ];
    }
}
