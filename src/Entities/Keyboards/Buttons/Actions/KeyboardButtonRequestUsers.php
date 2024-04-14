<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Button;

/**
 * Представляет критерии, используемые для запроса подходящих пользователей.
 *
 * Идентификаторы выбранных пользователей будет переданы боту при нажатии соответствующей кнопки.
 * {@link https://core.telegram.org/bots/features#chat-and-user-selection Подробнее о запросе пользователей}.
 *
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestusers
 *
 * @method       int getRequestId()           32-битный (signed) идентификатор запроса.
 * @method bool|null getUserIsBot()       (+) Запрашивать ботов.
 * @method bool|null getUserIsPremium()   (+) Запрашивать пользователей Телеграм Премиум.
 * @method bool|null getRequestName()     (+) Запрашивать имена и фамилии пользователей.
 * @method bool|null getRequestUsername() (+) Запрашивать юзернеймы пользователей.
 * @method bool|null getRequestPhoto()    (+) Запрашивать фото пользователей.
 * @method  int|null getMaxQuantity()     (+) Максимальное количество пользователей, которые будут выбраны.
 *
 * @method $this setRequestId(int $requestId)              32-битный (signed) идентификатор запроса.
 * @method $this setUserIsBot(bool $userIsBot)             Запрашивать ботов.
 * @method $this setUserIsPremium(bool $userIsPremium)     Запрашивать пользователей Телеграм Премиум.
 * @method $this setRequestName(bool $requestName)         Запрашивать имена и фамилии пользователей.
 * @method $this setRequestUsername(bool $requestUsername) Запрашивать юзернеймы пользователей.
 * @method $this setRequestPhoto(bool $requestPhoto)       Запрашивать фото пользователей.
 * @method $this setMaxQuantity(int $maxQuantity)          Максимальное количество пользователей, которые будут выбраны.
 */
#[Required([
    'request_id'
])]
class KeyboardButtonRequestUsers extends Button
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        int $requestId,
        ?bool $userIsBot = null,
        ?bool $userIsPremium = null,
        ?bool $requestName = null,
        ?bool $requestUsername = null,
        ?bool $requestPhoto = null,
        ?int $maxQuantity = null, // 1-10
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
