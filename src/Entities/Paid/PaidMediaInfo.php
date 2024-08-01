<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Paid\Media\PaidMedia;

/**
 * Представляет платные медиа, добавленные в сообщение.
 *
 * @link https://core.telegram.org/bots/api#paidmediainfo
 *
 * @method         int getStarCount() Количество Telegram Stars, которое необходимо заплатить, чтобы купить доступ к медиа.
 * @method PaidMedia[] getPaidMedia() Массив объектов с информацией о платных медиах.
 */
#[Required([
    'star_count',
    'paid_media'
])]
#[Depends([
    'paid_media' => [PaidMedia::class]
])]
class PaidMediaInfo extends Entity
{
    //
}
