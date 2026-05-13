<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Input;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidMediaType;

/**
 * Представляет платные медиа (фото).
 *
 * @link https://core.telegram.org/bots/api#inputpaidmediaphoto
 *
 * @method string getType()  Тип медиа. (Всегда "photo".)
 * @method string getMedia() Файл для отправки.
 */
#[Required([
    'type',
    'media'
])]
class InputPaidMediaPhoto extends InputPaidMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = PaidMediaType::PHOTO;

        parent::__construct($data);
    }
}
