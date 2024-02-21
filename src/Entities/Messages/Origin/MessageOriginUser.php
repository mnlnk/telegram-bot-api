<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет известного пользователя, отправившего оригинальное сообщение.
 *
 * @link https://core.telegram.org/bots/api#messageoriginuser
 *
 * @method string getType()       Тип источника сообщения.
 * @method    int getDate()       Дата отправки сообщения по времени Unix.
 * @method   User getSenderUser() Объект пользователя, отправившего сообщение.
 */
#[Required([
    'type',
    'date',
    'sender_user'
])]
#[Depends([
    'sender_user' => User::class
])]
class MessageOriginUser extends MessageOrigin
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = MessageOriginType::USER;

        parent::__construct($data);
    }
}
