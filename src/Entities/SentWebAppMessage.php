<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

/**
 * Представляет встроенное сообщение, отправленное веб-приложением от имени пользователя.
 *
 * @link https://core.telegram.org/bots/api#sentwebappmessage
 *
 * @method string|null getInlineMessageId() (+) Идентификатор отправленного встроенного сообщения. Доступно только в том случае, если к сообщению прикреплена встроенная клавиатура.
 */
class SentWebAppMessage extends Entity
{
    //
}
