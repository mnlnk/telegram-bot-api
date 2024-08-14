<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\Media\PaidMedia;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет транзакцию с пользователем.
 *
 * @link https://core.telegram.org/bots/api#transactionpartneruser
 *
 * @method         string getType()               Тип партнера по транзакции.
 * @method           User getUser()               Объект с информацией о пользователе.
 * @method    string|null getInvoicePayload() (+) Полезная нагрузка счет-фактуры, указанная ботом.
 * @method PaidMedia|null getPaidMedia()      (+) Массив объектов с информацией о платных медиа, купленных пользователем.
 */
#[Required([
    'type',
    'user'
])]
#[Depends([
    'user' => User::class,
    'paid_media' => [PaidMedia::class]
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
