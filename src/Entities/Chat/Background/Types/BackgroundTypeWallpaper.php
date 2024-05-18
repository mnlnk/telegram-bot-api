<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Document;

/**
 * Представляет фон из обоев в формате JPEG.
 *
 * @link https://core.telegram.org/bots/api#backgroundtypewallpaper
 *
 * @method    string getType()                 Тип фона.
 * @method  Document getDocument()             Объект файла документа с обоями.
 * @method       int getDarkThemeDimming()     Затемнение фона в темных темах, в процентах; 0-100.
 * @method bool|null getIsBlurred()        (+) Обои уменьшены до размера квадрата 450x450, а затем размыты по квадрату с радиусом 12.
 * @method bool|null getIsMoving()         (+) Фон слегка смещается при наклоне устройства.
 */
#[Required([
    'type',
    'document',
    'dark_theme_dimming'
])]
#[Depends([
    'document' => Document::class
])]
class BackgroundTypeWallpaper extends BackgroundType
{
    //
}
