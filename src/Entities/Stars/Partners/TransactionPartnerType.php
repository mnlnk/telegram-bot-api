<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Partners;

/**
 * Типы партнеров транзакции.
 *
 * @link https://core.telegram.org/bots/api#transactionpartner
 */
abstract class TransactionPartnerType
{
    /**
     * Транзакция с пользователем.
     *
     * @var string
     */
    const USER = 'user';

    /**
     * Транзакция с чатом.
     *
     * @var string
     */
    const CHAT = 'chat';

    /**
     * Транзакция партнерской программы.
     *
     * @var string
     */
    const AFFILIATE_PROGRAM = 'affiliate_program';

    /**
     * Транзакция с Fragment.
     *
     * @var string
     */
    const FRAGMENT = 'fragment';

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
            static::USER,
            static::CHAT,
            static::AFFILIATE_PROGRAM,
            static::FRAGMENT,
            static::TELEGRAM_ADS,
            static::TELEGRAM_API,
            static::OTHER
        ];
    }
}
