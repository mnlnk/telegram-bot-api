<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Transaction\Partners;

/**
 * Типы партнеров транзакции.
 *
 * @link https://core.telegram.org/bots/api#transactionpartner
 */
abstract class TransactionPartnerType
{
    /**
     * Транзакция с Fragment.
     *
     * @var string
     */
    const FRAGMENT = 'fragment';

    /**
     * Транзакция с пользователем.
     *
     * @var string
     */
    const USER = 'user';

    /**
     * Транзакция с неизвестным источником или получателем.
     *
     * @var string
     */
    const OTHER = 'other';

    # # #

    /**
     * Типы партнеров.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::FRAGMENT,
            static::USER,
            static::OTHER
        ];
    }
}
