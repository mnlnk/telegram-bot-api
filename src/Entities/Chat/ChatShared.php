<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions\KeyboardButtonRequestChat;

/**
 * Представляют информацию о чате, идентификатор которого был передан боту с помощью кнопки {@link KeyboardButtonRequestChat}.
 *
 * @link https://core.telegram.org/bots/api#chatshared
 *
 * @method int getRequestId() Идентификатор запроса.
 * @method int getChatId()    Идентификатор чата которым поделился пользователь.
 */
#[Required([
    'request_id',
    'chat_id'
])]
class ChatShared extends Entity
{
    //
}
