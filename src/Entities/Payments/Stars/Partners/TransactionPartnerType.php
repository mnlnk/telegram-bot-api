<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments\Stars\Partners;

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
     * Транзакция с платформой Telegram Ads.
     *
     * @var string
     */
    const TELEGRAM_ADS = 'telegram_ads';

    /**
     * Транзакция с оплатой платного вещания.
     *
     * @var string
     */
    const TELEGRAM_API = 'telegram_api';

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
            static::TELEGRAM_ADS,
            static::TELEGRAM_API,
            static::OTHER
        ];
    }
}
