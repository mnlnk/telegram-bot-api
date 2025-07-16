<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет платные медиа (видео).
 *
 * @link https://core.telegram.org/bots/api#inputpaidmediavideo
 *
 * @method      string getType()                  Тип медиа.
 * @method      string getMedia()                 Файл для отправки.
 * @method string|null getThumbnail()         (+) Миниатюра отправляемого файла.
 * @method string|null getCover()             (+) Обложка видео.
 * @method    int|null getStartTimestamp()    (+) Начальная временная метка для видео.
 * @method    int|null getWidth()             (+) Ширина видео.
 * @method    int|null getHeight()            (+) Высота видео.
 * @method    int|null getDuration()          (+) Продолжительность видео в секундах.
 * @method   bool|null getSupportsStreaming() (+) Загружаемое видео подходит для потоковой передачи.
 */
#[Required([
    'type',
    'media'
])]
class InputPaidMediaVideo extends InputPaidMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputMediaType::VIDEO;

        parent::__construct($data);
    }
}
