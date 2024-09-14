<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Boost\Sources;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет буст полученый за счет создания розыгрыша Телеграм Премиум.
 *
 * @link https://core.telegram.org/bots/api#chatboostsourcegiveaway
 *
 * @method    string getSource()                Источник буста.
 * @method       int getGiveawayMessageId()     Идентификатор сообщения в чате с розыгрышем; сообщение могло быть уже удалено. Может быть 0, если сообщение еще не отправлено.
 * @method User|null getUser()              (+) Объект пользователя, выигравшего приз в розыгрыше призов, если таковой имеется.
 * @method  int|null getPrizeStarCount()    (+) Количество Telegram Stars, которое будет разделено между победителями розыгрыша.
 * @method bool|null getIsUnclaimed()       (+) Розыгрыш состоялся, но не нашлось пользователя, выигравшего приз.
 */
#[Required([
    'source',
    'giveaway_message_id'
])]
#[Depends([
    'user' => User::class
])]
class ChatBoostSourceGiveaway extends ChatBoostSource
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['source'] = ChatBoostSource::GIVEAWAY;

        parent::__construct($data);
    }
}
