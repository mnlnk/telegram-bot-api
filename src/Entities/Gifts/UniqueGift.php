<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет уникальный подарок, представляющий собой улучшенную версию обычного подарка.
 *
 * @link https://core.telegram.org/bots/api#uniquegift
 *
 * @method             string getBaseName() Человекочитаемое название обычного подарка, из которого был улучшен этот уникальный подарок.
 * @method             string getName()     Уникальное название подарка. Его можно использовать в ссылках https://t.me/nft/... и разделах с историями.
 * @method                int getNumber()   Уникальный номер улучшенного подарка среди подарков, улучшенных с одного и того же обычного подарка.
 * @method    UniqueGiftModel getModel()    Объект модели уникального подарка
 * @method   UniqueGiftSymbol getSymbol()   Объект символа уникального подарка.
 * @method UniqueGiftBackdrop getBackdrop() Объект заднего фона уникального подарка.
 */
#[Required([
    'base_name',
    'name',
    'number',
    'model',
    'symbol',
    'backdrop'
])]
#[Depends([
    'model' => UniqueGiftModel::class,
    'symbol' => UniqueGiftSymbol::class,
    'backdrop' => UniqueGiftBackdrop::class
])]
class UniqueGift extends Entity
{
    //
}
