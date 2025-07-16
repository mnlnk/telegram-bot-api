<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Gift;

/**
 * Представляет транзакцию с пользователем.
 *
 * @link https://core.telegram.org/bots/api#transactionpartnerchat
 *
 * @method    string getType()     Тип партнера по транзакции.
 * @method      Chat getChat()     Объект с информацией о чате.
 * @method Gift|null getGift() (+) Объект подарка, отправленного ботом в чат.
 */
#[Required([
    'type',
    'chat'
])]
#[Depends([
    'chat' => Chat::class,
    'gift' => Gift::class
])]
class TransactionPartnerChat extends TransactionPartner
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = TransactionPartnerType::CHAT;

        parent::__construct($data);
    }
}
