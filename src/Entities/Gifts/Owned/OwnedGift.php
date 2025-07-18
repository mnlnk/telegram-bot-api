<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts\Owned;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет подарок, полученный пользователем или чатом и принадлежащий ему.
 *
 * @link https://core.telegram.org/bots/api#ownedgift
 *
 * @see OwnedGiftRegular
 * @see OwnedGiftUnique
 */
#[Concrete]
abstract class OwnedGift extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            OwnedGiftType::REGULAR => new OwnedGiftRegular($data),
            OwnedGiftType::UNIQUE  => new OwnedGiftUnique($data),
            default                => null
        };
    }
}
