<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid;

/**
 * Типы платных медиа.
 *
 * @link https://core.telegram.org/bots/api#paidmedia
 *
 * @see PaidMedia
 */
abstract class PaidMediaType
{
    /**
     * Платное живое фото.
     *
     * @var string
     */
    const LIVE_PHOTO = 'live_photo';

    /**
     * Платное фото.
     *
     * @var string
     */
    const PHOTO = 'photo';

    /**
     * Платное медиа недоступное до оплаты.
     *
     * @var string
     */
    const PREVIEW = 'preview';

    /**
     * Платное видео.
     *
     * @var string
     */
    const VIDEO = 'video';

    # # #

    /**
     * Типы платных медиа.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::LIVE_PHOTO,
            static::PHOTO,
            static::PREVIEW,
            static::VIDEO
        ];
    }
}
