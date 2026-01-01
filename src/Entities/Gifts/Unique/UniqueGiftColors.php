<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts\Unique;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Содержит информацию о цветовой схеме для имени пользователя, ответов на сообщения и предварительного просмотра ссылок, основанную на уникальном подарке.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftcolors
 *
 * @method string getModelCustomEmojiId()    Пользовательский идентификатор эмоджи для уникальной модели подарка.
 * @method string getSymbolCustomEmojiId()   Пользовательский идентификатор эмоджи, обозначающий уникальный символ подарка.
 * @method    int getLightThemeMainColor()   Основной цвет, используемый в светлых темах (RGB).
 * @method  int[] getLightThemeOtherColors() Список из 1-3 дополнительных цветов, используемых в светлых темах (RGB).
 * @method    int getDarkThemeMainColor()    Основной цвет, используемый в темных темах (RGB).
 * @method  int[] getDarkThemeOtherColors()  Список из 1-3 дополнительных цветов, используемых в темных темах (RGB).
 *
 * @since 9.3
 */
#[Required([
    'model_custom_emoji_id',
    'symbol_custom_emoji_id',
    'light_theme_main_color',
    'light_theme_other_colors',
    'dark_theme_main_color',
    'dark_theme_other_colors'
])]
class UniqueGiftColors extends Entity
{
    //
}
