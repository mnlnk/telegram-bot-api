<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет транзакцию вывода средств на платформу Telegram Ads.
 *
 * @link https://core.telegram.org/bots/api#transactionpartnertelegramads
 *
 * @method string getType() Тип партнера по транзакции.
 */
#[Required([
    'type'
])]
class TransactionPartnerTelegramAds extends TransactionPartner
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = TransactionPartnerType::TELEGRAM_ADS;

        parent::__construct($data);
    }
}
