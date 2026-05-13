<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет параметры доступа бота.
 *
 * @link https://core.telegram.org/bots/api#botaccesssettings
 *
 * @method        bool getIsAccessRestricted()     Доступ к боту имеют только избранные пользователи. Владелец бота всегда может получить к нему доступ.
 * @method User[]|null getAddedUsers()         (+) Список других пользователей, имеющих доступ к боту, если доступ ограничен.
 *
 * @since 10.0
 */
class BotAccessSettings extends Entity
{
    //
}
