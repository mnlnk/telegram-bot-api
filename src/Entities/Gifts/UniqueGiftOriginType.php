<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

/**
 * Представляет типы происхождения уникального подарка.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftinfo
 *
 * @see UniqueGiftInfo
 */
abstract class UniqueGiftOriginType
{
    /**
     * Улучшен с обычного подарка.
     *
     * @var string
     */
    const UPGRADE = 'upgrade';

    /**
     * Получен от другого пользователя.
     *
     * @var string
     */
    const TRANSFER = 'transfer';

    /**
     * Куплен у другого пользователя.
     *
     * @var string
     */
    const RESALE = 'resale';

    # # #

    /**
     * Типы происхожения уникальных подарков.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::UPGRADE,
            static::TRANSFER,
            static::RESALE
        ];
    }
}
