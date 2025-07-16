<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Profile;

/**
 * Представляет типы фото профиля.
 *
 * @link https://core.telegram.org/bots/api#inputprofilephoto
 */
abstract class InputProfilePhotoType
{
    /**
     * Статичное фото профиля в формате JPG.
     *
     * @var string
     */
    const STATIC = 'static';

    /**
     * Анимированное фото профиля в формате MPEG4.
     *
     * @var string
     */
    const ANIMATED = 'animated';

    # # #

    /**
     * Типы фото профиля.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::STATIC,
            static::ANIMATED
        ];
    }
}
