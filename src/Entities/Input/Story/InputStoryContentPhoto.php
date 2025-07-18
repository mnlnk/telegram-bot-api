<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Story;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;

/**
 * Представляет фото для публикации в виде истории.
 *
 * @link https://core.telegram.org/bots/api#inputstorycontentphoto
 *
 * @method           string getType()  Тип содержимого.
 * @method InputFile|string getPhoto() Фото для публикации.
 *
 * @method $this setPhoto(InputFile|string $photo) Фото для публикации.
 */
#[Required([
    'type',
    'photo'
])]
class InputStoryContentPhoto extends InputStoryContent
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputStoryContentType::PHOTO;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        InputFile|string $photo // 1080x1920 // <= 10mb
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
