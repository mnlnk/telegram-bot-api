<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Платное медиа недоступное до оплаты.
 *
 * @link https://core.telegram.org/bots/api#paidmediapreview
 *
 * @method string getType()         Тип платного медиа.
 * @method    int getWidth()    (+) Ширина медиа, определяемая отправителем.
 * @method    int getHeight()   (+) Высота медиа, определяемая отправителем
 * @method    int getDuration() (+) Продолжительность медиа в секундах, определяемая отправителем.
 */
#[Required([
    'type'
])]
class PaidMediaPreview extends PaidMedia
{
    //
}
