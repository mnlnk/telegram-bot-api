<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет партнерскую программу, выдающую партнерскую комиссию, полученную в результате этой транзакции.
 *
 * @link https://core.telegram.org/bots/api#transactionpartneraffiliateprogram
 *
 * @method    string getType()                   Тип партнера по транзакции.
 * @method User|null getSponsorUser()        (+) Объект c информацией о боте, спонсировавшем партнерскую программу.
 * @method       int getCommissionPerMille()     Количество Telegram Stars, полученных ботом, за каждые 1000 Telegram Stars.
 */
#[Required([
    'type',
    'commission_per_mille'
])]
#[Depends([
    'sponsor_user' => User::class
])]
class TransactionPartnerAffiliateProgram extends TransactionPartner
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = TransactionPartnerType::AFFILIATE_PROGRAM;

        parent::__construct($data);
    }
}
