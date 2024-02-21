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
 * @method       int getRequestId()         32-битный (signed) идентификатор запроса.
 * @method bool|null getUserIsBot()     (+) Запрашиваемые пользователи являются ботами.
 * @method bool|null getUserIsPremium() (+) Запрашиваемые пользователи являются пользователями Телеграм Премиум.
 * @method  int|null getMaxQuantity()   (+) Максимальное количество пользователей, которые будут выбраны.
 *
 * @method $this setRequestId(int $requestId)          32-битный (signed) идентификатор запроса.
 * @method $this setUserIsBot(bool $userIsBot)         Запрашиваемые пользователи являются ботами.
 * @method $this setUserIsPremium(bool $userIsPremium) Запрашиваемые пользователи являются пользователями Телеграм Премиум.
 * @method $this setMaxQuantity(int $maxQuantity)      Максимальное количество пользователей, которые будут выбраны.
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
        ?int $maxQuantity = null // 1-10
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
