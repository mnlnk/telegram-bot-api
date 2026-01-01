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
 * @method bool getPremiumSubscription() Принимается подписка Телеграм Премиум.
 * @method bool getGiftsFromChannels()   Принимаются уникальные подарки из каналов.
 *
 * @method $this setUnlimitedGifts(bool $unlimitedGifts)           Принимаются неограниченные обычные подарки.
 * @method $this setLimitedGifts(bool $limitedGifts)               Принимаются лимитированые обычные подарки.
 * @method $this setUniqueGifts(bool $uniqueGifts)                 Принимаются уникальные подарки или подарки, которые можно бесплатно улучшить до уникальных.
 * @method $this setPremiumSubscription(bool $premiumSubscription) Принимается подписка Телеграм Премиум.
 * @method $this setGiftsFromChannels(bool $giftsFromChannels)     Принимаются уникальные подарки из каналов.
 */
#[Required([
    'unlimited_gifts',
    'limited_gifts',
    'unique_gifts',
    'premium_subscription',
    'gifts_from_channels'
])]
class AcceptedGiftTypes extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        bool $unlimitedGifts,
        bool $limitedGifts,
        bool $uniqueGifts,
        bool $premiumSubscription,
        bool $giftsFromChannels
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
