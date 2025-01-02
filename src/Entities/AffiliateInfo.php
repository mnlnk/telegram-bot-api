<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;

/**
 * Представляет информацию о партнере, получившем комиссию за эту транзакцию.
 *
 * @link https://core.telegram.org/bots/api#affiliateinfo
 *
 * @method User|null getAffiliateUser()      (+) Объект пользователя (бота), получившего партнёрскую комиссию, если она была получена пользователем или ботом.
 * @method Chat|null getAffiliateChat()      (+) Объект чата, получивший партнерскую комиссию, если она была получена чатом.
 * @method       int getCommissionPerMille()     Количество Telegram Stars, полученных партнером за каждые 1000 Telegram Stars.
 * @method       int getAmount()                 Количество Telegram Stars, полученное партнером от транзакции, округленное до 0; может быть отрицательным для возвратов.
 * @method  int|null getNanostarAmount()     (+) Количество 1/1000000000 Telegram Stars, полученных партнером; может быть отрицательным для возвратов.
 */
#[Required([
    'commission_per_mille',
    'amount'
])]
#[Depends([
    'affiliate_user' => User::class,
    'affiliate_chat' => Chat::class
])]
class AffiliateInfo extends Entity
{
    //
}
