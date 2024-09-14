<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет сообщение о запланированном розыгрыше подарков.
 *
 * @link https://core.telegram.org/bots/api#giveaway
 *
 * @method        Chat[] getChats()                             Массив объектов чатов, к которым пользователь должен присоединиться для участия в розыгрыше.
 * @method           int getWinnersSelectionDate()              Момент времени (Unix), когда будут выбраны победители розыгрыша.
 * @method           int getWinnerCount()                       Количество пользователей, которые должны быть выбраны победителями розыгрыша.
 * @method     bool|null getOnlyNewMembers()                (+) Только пользователи, которые присоединяются к чатам после начала розыгрыша, имеют право на победу.
 * @method     bool|null getHasPublicWinners()              (+) Список победителей розыгрыша будет виден всем.
 * @method   string|null getPrizeDescription()              (+) Описание дополнительного приза розыгрыша.
 * @method string[]|null getCountryCodes()                  (+) Список двухбуквенных кодов стран ISO 3166-1 alpha-2, указывающих страны, из которых должны прибыть пользователи, имеющие право на участие в розыгрыше призов.
 * @method      int|null getPrizeStarCount()                (+) Количество Telegram Stars, которое будет разделено между победителями розыгрыша.
 * @method      int|null getPremiumSubscriptionMonthCount() (+) Количество месяцев, в течение которых будет активна подписка Телеграм Премиум, выигранная в результате розыгрыша.
 */
#[Required([
    'chats',
    'winners_selection_date',
    'winner_count'
])]
#[Depends([
    'chats' => [Chat::class]
])]
class Giveaway extends Entity
{
    //
}
