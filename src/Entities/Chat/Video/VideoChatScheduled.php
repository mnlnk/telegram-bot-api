<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Video;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение о запланированном видеочате.
 *
 * @link https://core.telegram.org/bots/api#videochatscheduled
 *
 * @method int getStartDate() Момент времени (Unix), когда видеочат должен быть запущен администратором чата.
 */
#[Required([
    'start_date'
])]
class VideoChatScheduled extends Entity
{
    //
}
