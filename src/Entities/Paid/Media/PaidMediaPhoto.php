<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет платное медиа (фото).
 *
 * @link https://core.telegram.org/bots/api#paidmediaphoto
 *
 * @method      string getType()  Тип платного медиа.
 * @method PhotoSize[] getPhoto() Массив объектов фотографий.
 */
#[Required([
    'type',
    'photo'
])]
#[Depends([
    'photo' => [PhotoSize::class]
])]
class PaidMediaPhoto extends PaidMedia
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
