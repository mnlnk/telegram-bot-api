<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Button;

/**
 * Представляет параметры для создания управляемого бота.
 *
 * Информация о созданном боте будет передана боту с помощью команды обновления "managed_bot" и сообщения с полем "managed_bot_created".
 *
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestmanagedbot
 *
 * @method         int getRequestId()             32-битный (signed) идентификатор запроса.
 * @method string|null getSuggestedName()     (+) Предлагаемое имя для бота.
 * @method string|null getSuggestedUsername() (+) Предлагаемый юзернейм для бота.
 */
#[Required([
    'request_id'
])]
class KeyboardButtonRequestManagedBot extends Button
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        int $requestId,
        ?string $suggestedName = null,
        ?string $suggestedUsername = null,
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
