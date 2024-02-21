<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers;

/**
 * Представляет часть маски лица.
 *
 * @link https://core.telegram.org/bots/api#maskposition
 */
abstract class MaskPositionPoint
{
    /**
     * Лоб.
     *
     * @var string
     */
    const FOREHEAD = 'forehead';

    /**
     * Глаза.
     *
     * @var string
     */
    const EYES = 'eyes';

    /**
     * Рот.
     *
     * @var string
     */
    const MOUTH = 'mouth';

    /**
     * Подбородок.
     *
     * @var string
     */
    const CHIN = 'chin';

    # # #

    /**
     * Части лица маски.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::FOREHEAD,
            static::EYES,
            static::MOUTH,
            static::CHIN
        ];
    }
}
