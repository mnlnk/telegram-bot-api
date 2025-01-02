<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляеит источник транзакции или ее получателя для исходящих транзакций.
 *
 * @link https://core.telegram.org/bots/api#transactionpartner
 *
 * @see TransactionPartnerFragment
 * @see TransactionPartnerUser
 * @see TransactionPartnerTelegramAds
 * @see TransactionPartnerOther
 */
#[Concrete]
abstract class TransactionPartner extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            TransactionPartnerType::USER         => new TransactionPartnerUser($data),
            TransactionPartnerType::FRAGMENT     => new TransactionPartnerFragment($data),
            TransactionPartnerType::TELEGRAM_ADS => new TransactionPartnerTelegramAds($data),
            TransactionPartnerType::TELEGRAM_API => new TransactionPartnerTelegramApi($data),
            TransactionPartnerType::OTHER        => new TransactionPartnerOther($data),
            default                              => null
        };
    }
}
