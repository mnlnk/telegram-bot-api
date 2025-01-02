<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет встроенное сообщение, которое будет отправлено пользователем мини-приложения.
 *
 * @link https://core.telegram.org/bots/api#preparedinlinemessage
 *
 * @method string getId()             Уникальный идентификатор подготовленного сообщения.
 * @method    int getExpirationDate() Срок действия подготовленного сообщения по времени Unix.
 */
#[Required([
    'id',
    'expiration_date'
])]
class PreparedInlineMessage extends Entity
{
    //
}
