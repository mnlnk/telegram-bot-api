<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Transaction\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет транзакцию с пользователем.
 *
 * @link https://core.telegram.org/bots/api#transactionpartneruser
 *
 * @method string getType() Тип партнера по транзакции.
 * @method   User getUser() Объект с информация о пользователе.
 */
#[Required([
    'type',
    'user'
])]
#[Depends([
    'user' => User::class
])]
class TransactionPartnerUser extends TransactionPartner
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = TransactionPartnerType::USER;

        parent::__construct($data);
    }
}
