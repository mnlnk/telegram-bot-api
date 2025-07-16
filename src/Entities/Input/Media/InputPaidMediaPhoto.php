<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет платные медиа (фото).
 *
 * @link https://core.telegram.org/bots/api#inputpaidmediaphoto
 *
 * @method string getType()  Тип медиа.
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
        $data['type'] = InputMediaType::PHOTO;

        parent::__construct($data);
    }
}
