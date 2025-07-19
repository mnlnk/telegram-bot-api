<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение об изменении стоимости сообщений, отправляемых в чат канала.
 *
 * @link https://core.telegram.org/bots/api#directmessagepricechanged
 *
 * @method     bool getAreDirectMessagesEnabled()     Включены сообщения для чата канала.
 * @method int|null getDirectMessageStarCount()   (+) Новое количество звёзд Телеграм, которое пользователи должны платить за каждое отправленное сообщение в канал. Не распространяется на пользователей, освобожденных администраторами.
 *
 * @since 9.1
 */
class DirectMessagePriceChanged extends Entity
{
    //
}
