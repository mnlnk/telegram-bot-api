<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Media;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Input\InputType;

/**
 * Представляет файл стикера.
 *
 * @link https://core.telegram.org/bots/api#inputmediasticker
 *
 * @method      string getType()      Тип результата. (Всегда "sticker".)
 * @method      string getMedia()     Файл для отправки.
 * @method string|null getEmoji() (+) Эмодзи, связанные со стикером; только для только что загруженных стикеров.
 *
 * @method $this setMedia(string $media) Файл для отправки.
 * @method $this setEmoji(string $emoji) Эмодзи, связанные со стикером; только для только что загруженных стикеров.
 *
 * @since 10.0
 */
#[Required([
    'type',
    'media'
])]
class InputMediaSticker extends InputMedia
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputType::STICKER;

        parent::__construct($data);
    }

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $media,
        ?string $emoji = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
