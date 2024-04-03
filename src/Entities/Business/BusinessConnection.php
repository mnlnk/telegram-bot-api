<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Business;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет описание подключения бота к бизнес-аккаунту.
 *
 * @link https://core.telegram.org/bots/api#businessconnection
 *
 * @method string getId()         Уникальный идентификатор соединения.
 * @method   User getUser()       Объект пользователя бизнес-аккаунта, создавшего соединение.
 * @method    int getUserChatId() Идентификатор приватного чата с пользователем, создавшим соединение.
 * @method    int getDate()       Дата установления соединения по Unix-времени.
 * @method   bool getCanReply()   Бот может действовать от имени бизнес-аккаунта в чатах, которые были активны за последние 24 часа.
 * @method   bool getIsEnabled()  Соединение активно.
 */
#[Required([
    'id',
    'user',
    'user_chat_id',
    'date',
    'can_reply',
    'is_enabled'
])]
#[Depends([
    'user' => User::class
])]
class BusinessConnection extends Entity implements UpdateContext
{
    //
}
