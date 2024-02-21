<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет короткое описание бота.
 *
 * @link https://core.telegram.org/bots/api#botshortdescription
 *
 * @method string getShortDescription() Короткое описание бота.
 */
#[Required([
    'short_description'
])]
class BotShortDescription extends Entity
{
    //
}
