<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет встроенное сообщение, отправленное гостевым ботом.
 *
 * @link https://core.telegram.org/bots/api#sentguestmessage
 *
 * @method string getInlineMessageId() Идентификатор отправленного встроенного сообщения.
 *
 * @since 10.0
 */
#[Required([
    'inline_message_id'
])]
class SentGuestMessage extends Entity
{
    //
}
