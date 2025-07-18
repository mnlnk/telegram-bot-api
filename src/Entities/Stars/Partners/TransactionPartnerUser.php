<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars\Partners;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Gifts\Gift;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\Media\PaidMedia;
use Manuylenko\Telegram\Bot\Api\Entities\Stars\AffiliateInfo;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет транзакцию с пользователем.
 *
 * @link https://core.telegram.org/bots/api#transactionpartneruser
 *
 * @method             string getType()                            Тип партнера по транзакции.
 * @method               User getUser()                            Информация о пользователе.
 * @method AffiliateInfo|null getAffiliate()                   (+) Информация о партнёре, получившем комиссию по этой транзакции.
 * @method        string|null getInvoicePayload()              (+) Полезная нагрузка счет-фактуры, указанная ботом.
 * @method           int|null getSubscriptionPeriod()          (+) Продолжительность платной подписки.
 * @method     PaidMedia|null getPaidMedia()                   (+) Информация о платных медиа, купленных пользователем.
 * @method        string|null getPaidMediaPayload()            (+) Полезная нагрузка платного медиа, указанная ботом.
 * @method          Gift|null getGift()                        (+) Подарок, отправленный пользователю ботом.
 * @method           int|null getPremiumSubscriptionDuration() (+) Количество месяцев, в течение которых будет активна подаренная подписка Телеграм Премиум.
 */
#[Required([
    'type',
    'user'
])]
#[Depends([
    'user' => User::class,
    'affiliate' => AffiliateInfo::class,
    'paid_media' => [PaidMedia::class],
    'gift' => Gift::class
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
