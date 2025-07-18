<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts\Owned;

/**
 * Типы подарков полученые пользователем или чатом.
 *
 * @link https://core.telegram.org/bots/api#ownedgift
 */
abstract class OwnedGiftType
{
    /**
     * Обычный подарок.
     *
     * @var string
     */
    const REGULAR = 'regular';

    /**
     * Уникальный подарок.
     *
     * @var string
     */
    const UNIQUE = 'unique';

    # # #

    /**
     * Типы подарков.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::REGULAR,
            static::UNIQUE
        ];
    }
}
