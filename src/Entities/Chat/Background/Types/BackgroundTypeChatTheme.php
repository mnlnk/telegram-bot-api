<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет фон взятый непосредственно из встроенной темы чата.
 *
 * @link https://core.telegram.org/bots/api#backgroundtypechattheme
 *
 * @method string getType()      Тип фона.
 * @method string getThemeName() Название темы чата, обычно это смайлик.
 */
#[Required([
    'type',
    'theme_name'
])]
class BackgroundTypeChatTheme extends BackgroundType
{
    //
}
