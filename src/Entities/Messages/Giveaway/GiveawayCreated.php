<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Giveaway;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение о создании запланированного розыгрыша.
 *
 * @link https://core.telegram.org/bots/api#giveawaycreated
 *
 * @method int|null getPrizeStarCount() (+) Количество Telegram Stars, которое будет разделено между победителями розыгрыша.
 */
class GiveawayCreated extends Entity
{
    //
}
