<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Story;

/**
 * Представляет типы содержимого истории.
 *
 * @link https://core.telegram.org/bots/api#inputstorycontent
 */
abstract class InputStoryContentType
{
    /**
     * Фото.
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

    # # #

    /**
     * Типы содержимого истории.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::PHOTO,
            static::VIDEO
        ];
    }
}
