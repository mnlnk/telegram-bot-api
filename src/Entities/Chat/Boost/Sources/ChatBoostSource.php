<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\Sources;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет источник буста чата.
 *
 * @link https://core.telegram.org/bots/api#chatboostsource
 *
 * @see ChatBoostSourcePremium
 * @see ChatBoostSourceGiftCode
 * @see ChatBoostSourceGiveaway
 */
#[Concrete]
abstract class ChatBoostSource extends Entity
{
    /**
     * Подписка.
     *
     * @var string
     */
    const PREMIUM = 'premium';

    /**
     * Подарочный код.
     *
     * @var string
     */
    const GIFT_CODE = 'gift_code';

    /**
     * Розыгрыш.
     *
     * @var string
     */
    const GIVEAWAY = 'giveaway';

    # # #

    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['source']) {
            ChatBoostSource::PREMIUM   => new ChatBoostSourcePremium($data),
            ChatBoostSource::GIFT_CODE => new ChatBoostSourceGiftCode($data),
            ChatBoostSource::GIVEAWAY  => new ChatBoostSourceGiveaway($data),
            default                    => null
        };
    }
}
