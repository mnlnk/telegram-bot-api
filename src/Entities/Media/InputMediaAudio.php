<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет отправляемый аудио-файл, который следует рассматривать как музыку.
 *
 * @link https://core.telegram.org/bots/api#inputmediaaudio
 *
 * @method                string getType()                Тип результата.
 * @method                string getMedia()               Медиа-файл.
 * @method InputFile|string|null getThumbnail()       (+) Миниатюра.
 * @method           string|null getCaption()         (+) Подпись файла.
 * @method           string|null getParseMode()       (+) Режим разбора специальных сущностей в подписи.
 * @method  MessageEntity[]|null getCaptionEntities() (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method              int|null getDuration()        (+) Продолжительность звука в секундах.
 * @method           string|null getPerformer()       (+) Исполнитель.
 * @method           string|null getTitle()           (+) Название.
 *
 * @method $this setMedia(string $media)                              Медиа-файл.
 * @method $this setThumbnail(InputFile|string $thumbnail)            Миниатюра.
 * @method $this setCaption(string $caption)                          Подпись файла.
 * @method $this setParseMode(string $parseMode)                      Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setDuration(int $duration)                           Продолжительность звука в секундах.
 * @method $this setPerformer(string $performer)                      Исполнитель.
 * @method $this setTitle(string $title)                              Название.
 */
#[Required([
    'type',
    'media'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class]
])]
class InputMediaAudio extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputMediaType::AUDIO;

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
        ?int $duration = null,
        ?string $performer = null,
        ?string $title = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
