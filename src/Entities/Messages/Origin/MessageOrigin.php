<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Origin;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет описание происхождение сообщения.
 *
 * @link https://core.telegram.org/bots/api#messageorigin
 *
 * @see MessageOriginUser
 * @see MessageOriginHiddenUser
 * @see MessageOriginChat
 * @see MessageOriginChannel
 */
#[Concrete]
abstract class MessageOrigin extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            MessageOriginType::USER        => new MessageOriginUser($data),
            MessageOriginType::HIDDEN_USER => new MessageOriginHiddenUser($data),
            MessageOriginType::CHAT        => new MessageOriginChat($data),
            MessageOriginType::CHANNEL     => new MessageOriginChannel($data),
            default                        => null
        };
    }
}
