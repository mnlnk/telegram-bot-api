<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет описание бота.
 *
 * @link https://core.telegram.org/bots/api#botdescription
 *
 * @method string getDescription() Описание бота.
 */
#[Required([
    'description'
])]
class BotDescription extends Entity
{
    //
}
