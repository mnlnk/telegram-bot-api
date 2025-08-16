<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Suggestions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Пердставляет цену предлагаемого поста.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostprice
 *
 * @method string getCurrency() Валюта, в которой будет оплачена публикация. В настоящее время это может быть "XTR" для звезд Телеграм или "TON" для тонкоинов.
 * @method    int getAmount()   Сумма, которая будет выплачена за публикацию, в самых маленьких единицах. Для звезд Телеграм должна быть от 5 до 100 000, а цена в nano-toncoins — от 1 000 000 до 1 000 000 0000000.
 *
 * @since 9.2
 */
#[Required([
    'currency',
    'amount'
])]
class SuggestedPostPrice extends Entity
{
    //
}
