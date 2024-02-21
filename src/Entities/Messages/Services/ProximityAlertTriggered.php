<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Services;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет содержимое служебного сообщения, отправляемого всякий раз,
 * когда пользователь в чате инициирует оповещение о приближении, установленное другим пользователем.
 *
 * @link https://core.telegram.org/bots/api#proximityalerttriggered
 *
 * @method User getTraveler() Объект пользователя, вызвавшего оповещение.
 * @method User getWatcher()  Объект пользователя, установившего оповещение.
 * @method  int getDistance() Расстояние между пользователями.
 */
#[Required([
    'traveler',
    'watcher',
    'distance'
])]
#[Depends([
    'traveler' => User::class,
    'watcher' => User::class
])]
class ProximityAlertTriggered extends Entity
{
    //
}
