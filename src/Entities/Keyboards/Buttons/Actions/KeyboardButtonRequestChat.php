<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\ChatAdministratorRights;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Button;

/**
 * Представляет критерии, используемые для запроса подходящего чата.
 *
 * Идентификатор выбранного чата будет передан боту при нажатии соответствующей кнопки.
 *
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 *
 * @method                          int getRequestId()                   32-битный (signed) идентификатор запроса.
 * @method                         bool getChatIsChannel()               Чат является каналом (true) или группой/супергруппой (false).
 * @method                    bool|null getChatIsForum()             (+) Чат является форумом супергруппы.
 * @method                    bool|null getChatHasUsername()         (+) Супергруппа или канал имеет псевдоним.
 * @method                    bool|null getChatIsCreated()           (+) Чат принадлежит пользователю.
 * @method ChatAdministratorRights|null getUserAdministratorRights() (+) Объект с перечислением необходимых прав администратора (пользователя) в чате.
 * @method ChatAdministratorRights|null getBotAdministratorRights()  (+) Объект с перечислением необходимых прав администратора (бота) в чате.
 * @method                    bool|null getBotIsMember()             (+) Бот является участником чата.
 * @method                    bool|null getRequestTitle()            (+) Запрашивать название чата.
 * @method                    bool|null getRequestUsername()         (+) Запрашивать юзернейм чата.
 * @method                    bool|null getRequestPhoto()            (+) Запрашивать фото чата.
 *
 * @method $this setRequestId(int $requestId)                                                 32-битный (signed) идентификатор запроса.
 * @method $this setChatIsChannel(bool $chatIsChannel)                                        Чат является каналом (true) или группой/супергруппой (false).
 * @method $this setChatIsForum(bool $chatIsForum)                                            Чат является форумом супергруппы.
 * @method $this setChatHasUsername(bool $chatHasUsername)                                    Супергруппа или канал имеет псевдоним.
 * @method $this setChatIsCreated(bool $chatIsCreated)                                        Чат принадлежит пользователю.
 * @method $this setUserAdministratorRights(ChatAdministratorRights $userAdministratorRights) Объект с перечислением необходимых прав администратора (пользователя) в чате.
 * @method $this setBotAdministratorRights(ChatAdministratorRights $botAdministratorRights)   Объект с перечислением необходимых прав администратора (бота) в чате.
 * @method $this setBotIsMember(bool $botIsMember)                                            Бот является участником чата.
 * @method $this setRequestTitle(bool $requestTitle)                                          Запрашивать название чата.
 * @method $this setRequestUsername(bool $requestUsername)                                    Запрашивать юзернейм чата.
 * @method $this setRequestPhoto(bool $requestPhoto)                                          Запрашивать фото чата.
 *
 * @see https://core.telegram.org/bots/features#chat-and-user-selection
 */
#[Required([
    'request_id',
    'chat_is_channel'
])]
#[Depends([
    'user_administrator_rights' => ChatAdministratorRights::class,
    'bot_administrator_rights' => ChatAdministratorRights::class
])]
class KeyboardButtonRequestChat extends Button
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        int $requestId,
        bool $chatIsChannel,
        ?bool $chatIsForum = null,
        ?bool $chatHasUsername = null,
        ?bool $chatIsCreated = null,
        ?ChatAdministratorRights $userAdministratorRights = null,
        ?ChatAdministratorRights $botAdministratorRights = null,
        ?bool $botIsMember = null,
        ?bool $requestTitle = null,
        ?bool $requestUsername = null,
        ?bool $requestPhoto = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
