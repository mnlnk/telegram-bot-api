<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\PaidType;

/**
 * Платное медиа недоступное до оплаты.
 *
 * @link https://core.telegram.org/bots/api#paidmediapreview
 *
 * @method string getType()         Тип платного медиа. (Всегда "preview".)
 * @method    int getWidth()    (+) Ширина медиа, определяемая отправителем.
 * @method    int getHeight()   (+) Высота медиа, определяемая отправителем
 * @method    int getDuration() (+) Продолжительность медиа в секундах, определяемая отправителем.
 */
#[Required([
    'type'
])]
class PaidMediaPreview extends PaidMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = PaidType::PREVIEW;

        parent::__construct($data);
    }
}
