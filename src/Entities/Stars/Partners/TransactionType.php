<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Partners;

/**
 * Представляет типы транзакций.
 *
 * @link https://core.telegram.org/bots/api#transactionpartneruser
 *
 * @see TransactionPartnerUser
 */
abstract class TransactionType
{
    /**
     * Платеж по счету.
     *
     * @var string
     */
    const INVOICE_PAYMENT = 'invoice_payment';

    /**
     * Платеж за платное медиа.
     *
     * @var string
     */
    const PAID_MEDIA_PAYMENT = 'paid_media_payment';

    /**
     * Подарок отправленый ботом.
     *
     * @var string
     */
    const GIFT_PURCHASE = 'gift_purchase';

    /**
     * Подписка Телеграм Премиум подареная ботом.
     *
     * @var string
     */
    const PREMIUM_PURCHASE = 'premium_purchase';

    /**
     * Прямой перевод с управляемого бизнес аккаунта.
     *
     * @var string
     */
    const BUSINESS_ACCOUNT_TRANSFER = 'business_account_transfer';

    # # #

    /**
     * Типы транзакций.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::INVOICE_PAYMENT,
            static::PAID_MEDIA_PAYMENT,
            static::GIFT_PURCHASE,
            static::PREMIUM_PURCHASE,
            static::BUSINESS_ACCOUNT_TRANSFER
        ];
    }
}
