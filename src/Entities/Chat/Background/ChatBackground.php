<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Types\BackgroundType;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет фон чата.
 *
 * @link https://core.telegram.org/bots/api#chatbackground
 *
 * @method BackgroundType getType() Объект типа фона.
 */
#[Required([
    'type'
])]
#[Depends([
    'type' => BackgroundType::class
])]
class ChatBackground extends Entity
{
    //
}
