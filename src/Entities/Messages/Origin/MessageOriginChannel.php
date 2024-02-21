<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;

/**
 * Представляет чат канала в который было отправлено оригинальное сообщение.
 *
 * @link https://core.telegram.org/bots/api#messageoriginchannel
 *
 * @method      string getType()                Тип источника сообщения.
 * @method         int getDate()                Дата отправки сообщения по времени Unix.
 * @method        Chat getChat()                Объект чата канала, в который изначально было отправлено сообщение.
 * @method         int getMessageId()           Уникальный идентификатор сообщения внутри чата.
 * @method string|null getAuthorSignature() (+) Подпись автора исходного сообщения.
 */
#[Required([
    'type',
    'date',
    'chat',
    'message_id'
])]
#[Depends([
    'chat' => Chat::class
])]
class MessageOriginChannel extends MessageOrigin
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = MessageOriginType::CHANNEL;

        parent::__construct($data);
    }
}
