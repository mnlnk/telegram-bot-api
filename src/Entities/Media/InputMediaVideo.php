<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет отправляемое видео.
 *
 * @link https://core.telegram.org/bots/api#inputmediavideo
 *
 * @method                string getType()                  Тип результата.
 * @method                string getMedia()                 Медиа-файл.
 * @method InputFile|string|null getThumbnail()         (+) Миниатюра.
 * @method           string|null getCaption()           (+) Подпись файла.
 * @method           string|null getParseMode()         (+) Режим разбора специальных сущностей в подписи.
 * @method  MessageEntity[]|null getCaptionEntities()   (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method              int|null getWidth()             (+) Ширина видео.
 * @method              int|null getHeight()            (+) Высота видео.
 * @method              int|null getDuration()          (+) Продолжительность видео в секундах.
 * @method             bool|null getSupportsStreaming() (+) Подходит для потоковой передачи.
 * @method             bool|null getHasSpoiler()        (+) Закрыто анимацией спойлера.
 *
 * @method $this setMedia(string $media)                              Медиа-файл.
 * @method $this setThumbnail(InputFile|string $thumbnail)            Миниатюра.
 * @method $this setCaption(string $caption)                          Подпись файла.
 * @method $this setParseMode(string $parseMode)                      Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setWidth(int $width)                                 Ширина видео.
 * @method $this setHeight(int $height)                               Высота видео.
 * @method $this setDuration(int $duration)                           Продолжительность видео в секундах.
 * @method $this setSupportsStreaming(bool $supportsStreaming)        Подходит для потоковой передачи.
 * @method $this setHasSpoiler(bool $hasSpoiler)                      Закрыто анимацией спойлера.
 */
#[Required([
    'type',
    'media'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class]
])]
class InputMediaVideo extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputMediaType::VIDEO;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     *
     * @param MessageEntity[] $captionEntities
     */
    public static function make(
        string $media,
        InputFile|string|null $thumbnail = null,
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?int $width = null,
        ?int $height = null,
        ?int $duration = null,
        ?bool $supportsStreaming = null,
        ?bool $hasSpoiler = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
