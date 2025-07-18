<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Story;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;

/**
 * Представляет видео для публикации в виде истории.
 *
 * @link https://core.telegram.org/bots/api#inputstorycontentvideo
 *
 * @method           string getType()                    Тип содержимого.
 * @method InputFile|string getVideo()                   Видео для публикации.
 * @method       float|null getDuration()            (+) Точная продолжительность видео в секундах.
 * @method       float|null getCoverFrameTimestamp() (+) Временная метка (в секундах) кадра, который будет использоваться в качестве статической обложки для истории.
 * @method        bool|null getIsAnimation()         (+) В видео нет звука.
 *
 * @method $this setVideo(InputFile|string $video)                  Видео для публикации.
 * @method $this setDuration(float $duration)                       Точная продолжительность видео в секундах.
 * @method $this setCoverFrameTimestamp(float $coverFrameTimestamp) Временная метка (в секундах) кадра, который будет использоваться в качестве статической обложки для истории.
 * @method $this setIsAnimation(bool $isAnimation)                  В видео нет звука.
 */
#[Required([
    'type',
    'video'
])]
class InputStoryContentVideo extends InputStoryContent
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputStoryContentType::VIDEO;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        InputFile|string $video, // 720x1280 // H.265 // <= 30mb // KF = 1sec
        ?float $duration = null, // 0-60
        ?float $coverFrameTimestamp = null,
        ?bool $isAnimation = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
