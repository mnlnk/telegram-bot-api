<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts\Owned;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет список подарков, полученных и принадлежащих пользователю или чату.
 *
 * @link https://core.telegram.org/bots/api#ownedgifts
 *
 * @method         int getTotalCount()     Общее количество подарков, принадлежащих пользователю или чату.
 * @method OwnedGift[] getGifts()          Массив объектов подарков.
 * @method string|null getNextOffset() (+) Смещение для следующего запроса. Если пусто, значит, результатов больше нет.
 */
#[Required([
    'total_count',
    'gifts'
])]
#[Depends([
    'gifts' => [OwnedGift::class]
])]
class OwnedGifts extends Entity
{
    //
}
