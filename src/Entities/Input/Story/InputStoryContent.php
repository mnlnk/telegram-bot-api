<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Story;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Concrete;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет содержимое истории, которую нужно опубликовать.
 *
 * @link https://core.telegram.org/bots/api#inputstorycontent
 *
 * @see InputStoryContentPhoto
 * @see InputStoryContentVideo
 */
#[Concrete]
class InputStoryContent extends Entity
{
    /**
     * Конкретная реализация.
     */
    public static function getConcrete(array $data): ?static
    {
        return match ($data['type']) {
            InputStoryContentType::PHOTO => new InputStoryContentPhoto($data),
            InputStoryContentType::VIDEO => new InputStoryContentVideo($data),
            default                      => null
        };
    }
}
