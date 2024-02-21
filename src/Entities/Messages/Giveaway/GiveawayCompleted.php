<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;

/**
 * Представляет служебное сообщение о завершении розыгрыша без публичных победителей.
 *
 * @link https://core.telegram.org/bots/api#giveawaycompleted
 *
 * @method          int getWinnerCount()             Количество победителей в розыгрыше.
 * @method     int|null getUnclaimedPrizeCount() (+) Количество нераспределенных призов.
 * @method Message|null getGiveawayMessage()     (+) Объект сообщения с завершенным розыгрышем, если оно (сообщение) не было удалено.
 */
#[Required([
    'winner_count'
])]
#[Depends([
    'giveaway_message' => Message::class
])]
class GiveawayCompleted extends Entity
{
    //
}
