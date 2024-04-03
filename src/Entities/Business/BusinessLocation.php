<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Business;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Location;

/**
 * Представляет местоположение бизнеса.
 *
 * @link https://core.telegram.org/bots/api#businesslocation
 *
 * @method   string getAddress()      Адрес бизнеса.
 * @method Location getLocation() (+) Объект местоположения бизнеса
 */
#[Required([
    'address'
])]
#[Depends([
    'location' => Location::class
])]
class BusinessLocation extends Entity
{
    //
}
