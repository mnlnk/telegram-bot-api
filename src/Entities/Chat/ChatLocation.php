<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Location;

/**
 * Представляет местоположение чата.
 *
 * @link https://core.telegram.org/bots/api#chatlocation
 *
 * @method Location getLocation() Объект местоположения, к которому подключена супергруппа.
 * @method   string getAddress()  Адрес местоположения, определенный владельцем чата.
 */
#[Required([
    'location',
    'address'
])]
#[Depends([
    'location' => Location::class
])]
class ChatLocation extends Entity
{
    //
}
