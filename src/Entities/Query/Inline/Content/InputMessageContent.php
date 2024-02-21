<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Content;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет содержимое, которое будет отправлено в результате встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inputmessagecontent
 *
 * @see InputTextMessageContent
 * @see InputLocationMessageContent
 * @see InputVenueMessageContent
 * @see InputContactMessageContent
 * @see InputInvoiceMessageContent
 */
#[Concrete]
abstract class InputMessageContent extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match (true) {
            isset($data['message_text']) => new InputTextMessageContent($data),
            isset($data['address'])      => new InputVenueMessageContent($data),
            isset($data['latitude'])     => new InputLocationMessageContent($data),
            isset($data['phone_number']) => new InputContactMessageContent($data),
            isset($data['payload'])      => new InputInvoiceMessageContent($data),
            default                      => null
        };
    }
}
