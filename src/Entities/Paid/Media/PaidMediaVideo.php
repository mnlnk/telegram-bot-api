<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Video;

/**
 * Представляет платное медиа (видео).
 *
 * @link https://core.telegram.org/bots/api#paidmediavideo
 *
 * @method string getType()  Тип платного медиа.
 * @method  Video getVideo() Объект видео.
 */
#[Required([
    'type',
    'video'
])]
#[Depends([
    'video' => Video::class
])]
class PaidMediaVideo extends PaidMedia
{
    //
}
