<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Input\InputType;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет живую фотографию, которая будет отправлена.
 *
 * @link https://core.telegram.org/bots/api#inputmedialivephoto
 *
 * @method               string getType()                      Тип результата. (Всегда "live_photo".)
 * @method               string getMedia()                     Видео с живым фото.
 * @method               string getPhoto()                     Статическое фото.
 * @method          string|null getCaption()               (+) Подпись к живому фото, от 0 до 1024 символов после анализа сущностей.
 * @method          string|null getParseMode()             (+) Режим для анализа объектов в подписи к живому фото.
 * @method MessageEntity[]|null getCaptionEntities()       (+) Список специальных сущностей, которые отображаются в подписи.
 * @method            bool|null getShowCaptionAboveMedia() (+) Подпись должна отображаться над медиаконтентом сообщения.
 * @method            bool|null getHasSpoiler()            (+) Необходимо закрыть живое фото анимацией-спойлером.
 *
 * @method $this setMedia(string $media)                               Видео с живым фото.
 * @method $this setPhoto(string $photo)                               Статическое фото.
 * @method $this setCaption(string $caption)                           Подпись к живому фото, от 0 до 1024 символов после анализа сущностей.
 * @method $this setParseMode(string $parseMode)                       Режим для анализа объектов в подписи к живому фото.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)  Список специальных сущностей, которые отображаются в подписи.
 * @method $this setShowCaptionAboveMedia(bool $showCaptionAboveMedia) Подпись должна отображаться над медиаконтентом сообщения.
 * @method $this setHasSpoiler(bool $hasSpoiler)                       Необходимо закрыть живое фото анимацией-спойлером.
 *
 * @since 10.0
 */
class InputMediaLivePhoto extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputType::LIVE_PHOTO;

        parent::__construct($data);
    }

    /**
     * Создает объект сущности.
     *
     * @param MessageEntity[]|null $captionEntities
     */
    public static function make(
        string $media,
        string $photo,
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
