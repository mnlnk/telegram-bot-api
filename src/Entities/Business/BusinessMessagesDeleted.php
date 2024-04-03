<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Business;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;

/**
 * Представляет объект сервисного сообщения получаемый при удалении сообщений из подключенного бизнес-аккаунта.
 *
 * @link https://core.telegram.org/bots/api#businessmessagesdeleted
 *
 * @method string getBusinessConnectionId() Уникальный идентификатор подкючения.
 * @method   Chat getChat()                 Объект с информацией о чате бизнес-аккаунта.
 * @method  int[] getMessageIds()           Список идентификаторов удаленных сообщений в чате бизнес-аккаунта.
 */
#[Required([
    'business_connection_id',
    'chat',
    'message_ids'
])]
#[Depends([
    'chat' => Chat::class
])]
class BusinessMessagesDeleted extends Entity implements UpdateContext
{
    //
}
