<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MaybeInaccessibleMessage;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет входящий запрос обратного вызова от кнопки обратного вызова на встроенной клавиатуре.
 *
 * @link https://core.telegram.org/bots/api#callbackquery
 *
 * @method                        string getId()                  Уникальный идентификатор запроса.
 * @method                          User getFrom()                Объект пользователя (отправителя) запроса.
 * @method MaybeInaccessibleMessage|null getMessage()         (+) Объект сообщения с кнопкой обратного вызова, которая инициировала запрос.
 * @method                   string|null getInlineMessageId() (+) Идентификатор сообщения, отправленного ботом во встроенном режиме, который инициировал запрос.
 * @method                        string getChatInstance()        Глобальный идентификатор, однозначно соответствующий чату, в который было отправлено сообщение с кнопкой обратного звонка.
 * @method                   string|null getData()            (+) Данные, связанные с кнопкой обратного вызова.
 * @method                   string|null getGameShortName()   (+) Краткое название возвращаемой игры, служит уникальным идентификатором игры.
 */
#[Required([
    'id',
    'from',
    'chat_instance'
])]
#[Depends([
    'from' => User::class,
    'message' => MaybeInaccessibleMessage::class
])]
class CallbackQuery extends Entity implements UpdateContext
{
    //
}
