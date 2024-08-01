<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Paid\Media;

/**
 * Типы платных медиа.
 *
 * @link https://core.telegram.org/bots/api#paidmedia
 */
abstract class PaidMediaType
{
    /**
     * Платное медиа недоступное до оплаты.
     *
     * @var string
     */
    const PREVIEW = 'preview';

    /**
     * Платное фото.
     *
     * @var string
     */
    const PHOTO = 'photo';

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
            static::PREVIEW,
            static::PHOTO,
            static::VIDEO
        ];
    }
}
