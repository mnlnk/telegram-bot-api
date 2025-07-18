<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts\Owned;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Gifts\UniqueGift;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет уникальный подарок, полученный и принадлежащий пользователю или чату.
 *
 * @link https://core.telegram.org/bots/api#ownedgiftunique
 *
 * @method      string getType()                  Тип подарка.
 * @method  UniqueGift getGift()                  Объект с информацией об уникальном подарке.
 * @method string|null getOwnedGiftId()       (+) Уникальный идентификатор полученного подарка для бота; только для подарков, полученных от имени бизнес-аккаунта.
 * @method   User|null getSenderUser()        (+) Объект пользователя (отправитель) подарка, если это известный пользователь.
 * @method         int getSendDate()              Дата отправки подарка в формате Unix.
 * @method   bool|null getIsSaved()           (+) Подарок отображается на странице профиля учетной записи; только для подарков, полученных от имени бизнес-аккаунта.
 * @method   bool|null getCanBeTransferred()  (+) Подарок может быть передан другому владельцу; только для подарков, полученных от имени бизнес-аккаунта.
 * @method    int|null getTransferStarCount() (+) Количество звёзд Телеграм, которое необходимо заплатить для перевода подарка; не указывается, если бот не может передать подарок.
 * @method    int|null getNextTransferDate()  (+) Метка времени Unix, когда подарок может быть передан. Если он уже прошёл, то подарок можно передать сейчас.
 */
#[Required([
    'type',
    'gift',
    'send_date'
])]
#[Depends([
    'gift' => UniqueGift::class,
    'sender_user' => User::class
])]
class OwnedGiftUnique extends OwnedGift
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = OwnedGiftType::UNIQUE;

        parent::__construct($data);
    }
}
