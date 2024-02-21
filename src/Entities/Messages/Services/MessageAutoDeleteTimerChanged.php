<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Services;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение об изменении настроек таймера автоудаления.
 *
 * @link https://core.telegram.org/bots/api#messageautodeletetimerchanged
 *
 * @method int getMessageAutoDeleteTime() Новое время автоудаления сообщений в чате; в секундах.
 */
#[Required([
    'message_auto_delete_time'
])]
class MessageAutoDeleteTimerChanged extends Entity
{
    //
}
