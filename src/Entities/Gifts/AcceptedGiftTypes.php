<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет типы подарков, которые можно подарить пользователю или чату.
 *
 * @link https://core.telegram.org/bots/api#acceptedgifttypes
 *
 * @method bool getUnlimitedGifts()      Принимаются неограниченные обычные подарки.
 * @method bool getLimitedGifts()        Принимаются лимитированые обычные подарки.
 * @method bool getUniqueGifts()         Принимаются уникальные подарки или подарки, которые можно бесплатно улучшить до уникальных.
 * @method bool getPremiumSubscription() Принимается подписка Telegram Premium.
 */
#[Required([
    'unlimited_gifts',
    'limited_gifts',
    'unique_gifts',
    'premium_subscription'
])]
class AcceptedGiftTypes extends Entity
{
    //
}
