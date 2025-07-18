<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение об обычном подарке, который был отправлен или получен.
 *
 * @link https://core.telegram.org/bots/api#giftinfo
 *
 * @method  UniqueGift getGift()                    Информация о подарке.
 * @method      string getOrigin()                  Происхождение подарка.
 * @method    int|null getLastResaleStarCount() (+) Цена, уплаченная за подарок; для подарков, купленных у других пользователей.
 * @method string|null getOwnedGiftId()         (+) Уникальный идентификатор полученного подарка для бота; присутствует только для подарков, полученных от имени бизнес-аккаунтов.
 * @method    int|null getTransferStarCount()   (+) Количество звёзд Телеграм, которое необходимо заплатить для перевода подарка; не указывается, если бот не может передать подарок.
 * @method    int|null getNextTransferDate()    (+) Метка времени Unix, когда подарок может быть передан. Если он уже прошёл, то подарок можно передать сейчас.
 */
#[Required([
    'gift',
    'origin'
])]
#[Depends([
    'gift' => UniqueGift::class
])]
class UniqueGiftInfo extends Entity
{
    /**
     * Улучшен с обычного подарка.
     */
    public function isUpgrade(): bool
    {
        return $this->getOrigin() == UniqueGiftOriginType::UPGRADE;
    }

    /**
     * Получен от другого пользователя.
     */
    public function isTransfer(): bool
    {
        return $this->getOrigin() == UniqueGiftOriginType::TRANSFER;
    }

    /**
     * Куплен у другого пользователя.
     */
    public function isResale(): bool
    {
        return $this->getOrigin() == UniqueGiftOriginType::RESALE;
    }
}
