<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет транзакцию с неизвестным источником или получателем.
 *
 * @link https://core.telegram.org/bots/api#transactionpartnerother
 *
 * @method string getType() Тип партнера по транзакции.
 */
#[Required([
    'type'
])]
class TransactionPartnerOther extends TransactionPartner
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = TransactionPartnerType::OTHER;

        parent::__construct($data);
    }
}
