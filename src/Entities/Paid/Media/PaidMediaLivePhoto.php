<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\LivePhoto;

/**
 * Представляет платное медиа (живое фото).
 *
 * @link https://core.telegram.org/bots/api#paidmediaphoto
 *
 * @method    string getType()      Тип платного медиа. (Всегда "live_photo".)
 * @method LivePhoto getLivePhoto() Живое фото.
 *
 * @since 10.0
 */
#[Required([
    'type',
    'live_photo'
])]
#[Depends([
    'live_photo' => LivePhoto::class
])]
class PaidMediaLivePhoto extends PaidMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = PaidType::LIVE_PHOTO;

        parent::__construct($data);
    }
}
