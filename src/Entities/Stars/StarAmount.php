<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет количество звёзд Телеграм.
 *
 * @link https://core.telegram.org/bots/api#staramount
 *
 * @method int getAmount()             Целое число звёзд Телеграм.
 * @method int getNanostarAmount() (+) Количество 1/1000000000 звёзд Телеграм.
 */
#[Required([
    'amount',
    'nanostar_amount'
])]
class StarAmount extends Entity
{
    //
}
