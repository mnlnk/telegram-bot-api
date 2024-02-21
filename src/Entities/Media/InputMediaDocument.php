<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет отправляемый файл (документ).
 *
 * @link https://core.telegram.org/bots/api#inputmediadocument
 *
 * @method                string getType()                            Тип результата.
 * @method                string getMedia()                           Медиа-файл.
 * @method InputFile|string|null getThumbnail()                   (+) Миниатюра файла.
 * @method           string|null getCaption()                     (+) Подпись файла.
 * @method           string|null getParseMode()                   (+) Режим разбора специальных сущностей в подписи.
 * @method  MessageEntity[]|null getCaptionEntities()             (+) Массив объектов специальных сущностей, появляющихся в подписи.
 * @method             bool|null getDisableContentTypeDetection() (+) Отключено автоматическое определение типа контента на стороне сервера для файлов.
 *
 * @method $this setMedia(string $media)                                           Медиа-файл.
 * @method $this setThumbnail(InputFile|string $thumbnail)                         Миниатюра файла.
 * @method $this setCaption(string $caption)                                       Подпись файла.
 * @method $this setParseMode(string $parseMode)                                   Режим разбора специальных сущностей в подписи.
 * @method $this setCaptionEntities(MessageEntity[] $captionEntities)              Массив объектов специальных сущностей, появляющихся в подписи.
 * @method $this setDisableContentTypeDetection(bool $disableContentTypeDetection) Отключено автоматическое определение типа контента на стороне сервера для файлов.
 */
#[Required([
    'type',
    'media'
])]
#[Depends([
    'caption_entities' => [MessageEntity::class]
])]
class InputMediaDocument extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputMediaType::DOCUMENT;

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
        ?bool $disableContentTypeDetection = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
