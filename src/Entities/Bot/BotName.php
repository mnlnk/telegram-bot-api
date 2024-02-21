<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет имя бота.
 *
 * @link https://core.telegram.org/bots/api#botname
 *
 * @method string getName() Имя бота.
 */
#[Required([
    'name'
])]
class BotName extends Entity
{
    //
}
