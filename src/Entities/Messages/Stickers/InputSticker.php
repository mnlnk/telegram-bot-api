<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет файл стикера, который необходимо добавить в набор стикеров.
 *
 * @link https://core.telegram.org/bots/api#inputsticker
 *
 * @method            string getSticker()          Отправляемый стикер.
 * @method          string[] getEmojiList()        Массив эмоджи, связанных со стикером.
 * @method MaskPosition|null getMaskPosition() (+) Объект расположения маски на лице.
 * @method     string[]|null getKeywords()     (+) Массив ключевых слов для поиска стикера.
 *
 * @method $this setSticker(string $sticker)                 Отправляемый стикер.
 * @method $this setEmojiList(string[] $emojiList)           Массив эмоджи, связанных со стикером.
 * @method $this setMaskPosition(MaskPosition $maskPosition) Объект расположения маски на лице.
 * @method $this setKeywords(string[] $keywords)             Массив ключевых слов для поиска стикера.
 */
#[Required([
    'sticker',
    'emoji_list'
])]
#[Depends([
    'mask_position' => MaskPosition::class
])]
class InputSticker extends Entity
{
    /**
     * Создает объект сущности.
     *
     * @param string[] $emojiList
     * @param ?string[] $keywords
     */
    public static function make(
        string $sticker, // "file_id" или "url" файла (в документации сказано, что допустимо использовать объект "InputFile" вместо строки, но сервер ТГ требует только строку)
        array $emojiList,
        ?MaskPosition $maskPosition = null,
        ?array $keywords = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
