<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;

/**
 * Представляет сообщение, которое было удалено или иным образом недоступно боту.
 *
 * @link https://core.telegram.org/bots/api#inaccessiblemessage
 *
 * @method Chat getChat()      Объект чата, которому принадлежало сообщение.
 * @method  int getMessageId() Уникальный идентификатор сообщения внутри чата.
 * @method  int getDate()      Всегда 0. Поле можно использовать для различения обычных и недоступных сообщений.
 */
#[Depends([
    'chat' => Chat::class
])]
class InaccessibleMessage extends MaybeInaccessibleMessage
{
    //
}
