<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет уникальный идентификатор сообщения.
 *
 * @link https://core.telegram.org/bots/api#messageid
 *
 * @method int getMessageId() Уникальный идентификатор сообщения.
 */
#[Required([
    'message_id'
])]
class MessageId extends Entity
{
    //
}
