<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет сообщение о завершении розыгрыша с публичными победителями.
 *
 * @link https://core.telegram.org/bots/api#giveawaywinners
 *
 * @method        Chat getChat()                              Объект чата, создавшего розыгрыш.
 * @method         int getGiveawayMessageId()                 Идентификатор сообщения с розыгрышем в чате.
 * @method         int getWinnersSelectionDate()              Момент времени (Unix), когда были выбраны победители розыгрыша.
 * @method         int getWinnerCount()                       Общее количество победителей в розыгрыше.
 * @method      User[] getWinners()                           Массив объектов пользователей (победителей) розыгрыша. Не больше 100.
 * @method    int|null getAdditionalChatCount()           (+) Количество других чатов, к которым пользователь должен был присоединиться, чтобы иметь право на участие в розыгрыше призов.
 * @method    int|null getPremiumSubscriptionMonthCount() (+) Количество месяцев, в течение которых будет активна подписка Телеграм Премиум, выигранная в результате розыгрыша.
 * @method    int|null getUnclaimedPrizeCount()           (+) Количество нераспределенных призов.
 * @method   bool|null getOnlyNewMembers()                (+) На победу имели право только пользователи, присоединившиеся к чатам после начала розыгрыша.
 * @method   bool|null getWasRefunded()                   (+) Розыгрыш отменен из-за возврата оплаты за него.
 * @method string|null getPrizeDescription()              (+) Описание дополнительного приза розыгрыша.
 */
#[Required([
    'chat',
    'giveaway_message_id',
    'winners_selection_date',
    'winner_count',
    'winners'
])]
#[Depends([
    'chat' => Chat::class,
    'winners' => [User::class]
])]
class GiveawayWinners extends Entity
{
    //
}
