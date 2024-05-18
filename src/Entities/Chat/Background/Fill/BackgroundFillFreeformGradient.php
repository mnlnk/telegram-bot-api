<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Fill;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет градиент произвольной формы, который вращается после каждого сообщения в чате.
 *
 * @link https://core.telegram.org/bots/api#backgroundfillfreeformgradient
 *
 * @method string getType()   Тип заливки фона.
 * @method  int[] getColors() Список из 3 или 4 базовых цветов, которые используются для создания градиента произвольной формы в формате RGB24.
 */
#[Required([
    'type',
    'colors'
])]
class BackgroundFillFreeformGradient extends BackgroundFill
{
    //
}
