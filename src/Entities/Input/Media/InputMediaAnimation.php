<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет отправляемый файл анимации (видео GIF или H.264/MPEG-4 AVC без звука).
 *
 * @link https://core.telegram.org/bots/api#inputmediaanimation
 *
 * @method                string getType()                      Тип результата.
 * @method                string getMedia()                     Медиа-файл.
 * @method InputFile|string|null getThumbnail()             (+) Миниатюра.
 * @method           string|null getCaption()               (+) Подпись файла.
 * @method           string|null getParseMode()             (+) Режим разбора специальных сущностей в подписи.
 * @method  MessageEntity[]|null getCaptionEntities()       (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method             bool|null getShowCaptionAboveMedia() (+) Показывать подпись над медиа.
 * @method              int|null getWidth()                 (+) Ширина анимации.
 * @method              int|null getHeight()                (+) Высота анимации.
 * @method              int|null getDuration()              (+) Продолжительность анимации в секундах.
 * @method             bool|null getHasSpoiler()            (+) Закрыто анимацией спойлера.
 *
 * @method $this setMedia(string $media)                               Медиа-файл.
 * @method $this setThumbnail(InputFile|string $thumbnail)             Миниатюра.
 * @method $this setCaption(string $caption)                           Подпись файла.
 * @method $this setParseMode(string $parseMode)                       Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)  Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setShowCaptionAboveMedia(bool $showCaptionAboveMedia) Показывать подпись над медиа.
 * @method $this setWidth(int $width)                                  Ширина анимации.
 * @method $this setHeight(int $height)                                Высота анимации.
 * @method $this setDuration(int $duration)                            Продолжительность анимации в секундах.
 * @method $this setHasSpoiler(bool $hasSpoiler)                       Закрыто анимацией спойлера.
 */
#[Required([
    'type',
    'media'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class]
])]
class InputMediaAnimation extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputMediaType::ANIMATION;

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
        ?bool $showCaptionAboveMedia = null,
        ?int $width = null,
        ?int $height = null,
        ?int $duration = null,
        ?bool $hasSpoiler = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
