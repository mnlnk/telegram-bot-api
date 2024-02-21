<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;

/**
 * Представляет чат, от имени которого было отправлено оригинальное сообщение в групповой чат.
 *
 * @link https://core.telegram.org/bots/api#messageoriginchat
 *
 * @method      string getType()                Тип источника сообщения.
 * @method         int getDate()                Дата отправки сообщения по времени Unix.
 * @method        Chat getSenderChat()          Объект чата, от имени которого было отправлено сообщение.
 * @method string|null getAuthorSignature() (+) Подпись автора исходного сообщения.
 */
#[Required([
    'type',
    'date',
    'sender_chat'
])]
#[Depends([
    'sender_chat' => Chat::class
])]
class MessageOriginChat extends MessageOrigin
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = MessageOriginType::CHAT;

        parent::__construct($data);
    }
}
