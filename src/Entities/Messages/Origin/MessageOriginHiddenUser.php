<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет неизвестного пользователя, отправившего оригинальное сообщение.
 *
 * @link https://core.telegram.org/bots/api#messageoriginhiddenuser
 *
 * @method string getType()           Тип источника сообщения.
 * @method    int getDate()           Дата отправки сообщения по времени Unix.
 * @method string getSenderUserName() Имя пользователя, отправившего изначальное сообщение.
 */
#[Required([
    'type',
    'date',
    'sender_user_name'
])]
class MessageOriginHiddenUser extends MessageOrigin
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = MessageOriginType::HIDDEN_USER;

        parent::__construct($data);
    }
}
