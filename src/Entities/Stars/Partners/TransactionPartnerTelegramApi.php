<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет транзакцию с оплатой платного вещания.
 *
 * @link https://core.telegram.org/bots/api#transactionpartnertelegramapi
 *
 * @method string getType()         Тип партнера по транзакции.
 * @method    int getRequestCount() Количество успешных запросов, которые превысили обычные лимиты и поэтому были выставлены счета.
 */
#[Required([
    'type',
    'request_count'
])]
class TransactionPartnerTelegramApi extends TransactionPartner
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = TransactionPartnerType::TELEGRAM_API;

        parent::__construct($data);
    }
}
