<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет служебное сообщение об обычном подарке, который был отправлен или получен.
 *
 * @link https://core.telegram.org/bots/api#giftinfo
 *
 * @method                 Gift getGift()                        Информация о подарке.
 * @method          string|null getOwnedGiftId()             (+) Уникальный идентификатор полученного подарка для бота; присутствует только для подарков, полученных от имени бизнес-аккаунта.
 * @method             int|null getConvertStarCount()        (+) Количество звёзд Телеграм, которые получатель может получить, конвертировав подарок; не указывается, если конвертация в звёзд Телеграм невозможна.
 * @method             int|null getPrepaidUpgradeStarCount() (+) Количество звёзд Телеграм, которые были предоплачены отправителем за возможность улучшить подарок.
 * @method            bool|null getCanBeUpgraded()           (+) Подарок можно сделать уникальным.
 * @method          string|null getText()                    (+) Текст сообщения, добавленного к подарку.
 * @method MessageEntity[]|null getEntities()                (+) Специальные сущности, которые появляются в тексте.
 * @method            bool|null getIsPrivate()               (+) Отправитель и текст подарка видны только получателю подарка; в противном случае их смогут увидеть все.
 */
#[Required([
    'gift'
])]
#[Depends([
    'gift' => Gift::class,
    'entities' => [MessageEntity::class]
])]
class GiftInfo extends Entity
{
    //
}
