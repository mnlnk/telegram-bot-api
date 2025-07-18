<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts\Owned;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Gifts\Gift;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет обычный подарок, принадлежащий пользователю или чату.
 *
 * @link https://core.telegram.org/bots/api#ownedgiftregular
 *
 * @method               string getType()                        Тип подарка.
 * @method                 Gift getGift()                        Объект с информацией о чате.
 * @method          string|null getOwnedGiftId()             (+) Уникальный идентификатор подарка для бота; только для подарков, полученных от имени бизнес-аккаунта.
 * @method            User|null getSenderUser()              (+) Объект пользователя (отправителя) подарка, если это известный пользователь.
 * @method                  int getSendDate()                    Дата отправки подарка в формате Unix.
 * @method          string|null getText()                    (+) Текст сообщения, добавленного к подарку.
 * @method MessageEntity[]|null getEntities()                (+) Массив объектов специальных сущностей, которые появляются в тексте.
 * @method            bool|null getIsPrivate()               (+) Отправитель и текст подарка видны только получателю подарка; в противном случае их смогут увидеть все.
 * @method            bool|null getIsSaved()                 (+) Подарок отображается на странице профиля учётной записи; только для подарков, полученных от имени бизнес-аккаунта.
 * @method            bool|null getCanBeUpgraded()           (+) Подарок можно преобразовать в уникальный; только для подарков, полученных от имени бизнес-аккаунта.
 * @method            bool|null getWasRefunded()             (+) Подарок был возвращен и больше недоступен.
 * @method             int|null getConvertStarCount()        (+) Количество звезд Телеграм, которые получатель может получить вместо подарка; не указывается, если подарок нельзя конвертировать в звезды Телеграм.
 * @method             int|null getPrepaidUpgradeStarCount() (+) Количество звёзд Телеграм, уплаченных отправителем за возможность улучшить подарок.
 */
#[Required([
    'type',
    'gift',
    'send_date'
])]
#[Depends([
    'gift' => Gift::class,
    'sender_user' => User::class,
    'entities' => [MessageEntity::class]
])]
class OwnedGiftRegular extends OwnedGift
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = OwnedGiftType::REGULAR;

        parent::__construct($data);
    }
}
