<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Input;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidMediaType;

/**
 * Представляет платное медиа (живое фото).
 *
 * @link https://core.telegram.org/bots/api#inputpaidmediaphoto
 *
 * @method string getType()  Тип медиа. (Всегда "live_photo".)
 * @method string getMedia() Видеофайл с живым фото для отправки.
 * @method string getPhoto() Статическое фото для отправки.
 */
#[Required([
    'type',
    'media',
    'photo'
])]
class InputPaidMediaLivePhoto extends InputPaidMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = PaidMediaType::LIVE_PHOTO;

        parent::__construct($data);
    }
}
