<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Video;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение об окончании видеочата.
 *
 * @link https://core.telegram.org/bots/api#videochatended
 *
 * @method int getDuration() Продолжительность видеочата; в секундах.
 */
#[Required([
    'duration'
])]
class VideoChatEnded extends Entity
{
    //
}
