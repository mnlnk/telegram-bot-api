<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет сообщение, которое возможно недоступно боту.
 *
 * @link https://core.telegram.org/bots/api#maybeinaccessiblemessage
 *
 * @see Message
 * @see InaccessibleMessage
 */
#[Concrete]
abstract class MaybeInaccessibleMessage extends Entity
{
    /**
     * Конкретная реализация.
     */
    protected static function getConcrete(array $data): static
    {
        return $data['date'] === 0 ? new InaccessibleMessage($data) : new Message($data);
    }
}
