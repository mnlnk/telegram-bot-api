<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет отправляемую фотографию.
 *
 * @link https://core.telegram.org/bots/api#inputmediaphoto
 *
 * @method               string getType()                      Тип результата.
 * @method               string getMedia()                     Медиа-файл.
 * @method          string|null getCaption()               (+) Подпись файла.
 * @method          string|null getParseMode()             (+) Режим разбора специальных сущностей в подписи.
 * @method MessageEntity[]|null getCaptionEntities()       (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method            bool|null getShowCaptionAboveMedia() (+) Показывать подпись над медиа.
 * @method            bool|null getHasSpoiler()            (+) Закрыто анимацией спойлера.
 *
 * @method $this setMedia(string $media)                               Медиа-файл.
 * @method $this setCaption(string $caption)                           Подпись файла.
 * @method $this setParseMode(string $parseMode)                       Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)  Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setShowCaptionAboveMedia(bool $showCaptionAboveMedia) Показывать подпись над медиа.
 * @method $this setHasSpoiler(bool $hasSpoiler)                       Закрывать анимацией спойлера.
 */
#[Required([
    'type',
    'media'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class]
])]
class InputMediaPhoto extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputMediaType::PHOTO;

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
        ?string $caption = null,
        ?string $parseMode = null,
        ?array $captionEntities = null,
        ?bool $showCaptionAboveMedia = null,
        ?bool $hasSpoiler = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
