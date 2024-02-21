<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет пользователя или бота.
 *
 * @link https://core.telegram.org/bots/api#user
 *
 * @method         int getId()                          Уникальный идентификатор пользователя или бота.
 * @method        bool getIsBot()                       Пользователь ботом.
 * @method      string getFirstName()                   Имя пользователя или бота.
 * @method string|null getLastName()                (+) Фамилия пользователя или бота.
 * @method string|null getUsername()                (+) Юзернейм пользователя или бота.
 * @method string|null getLanguageCode()            (+) Языковой тег IETF для языка пользователя.
 * @method   bool|null getIsPremium()               (+) Пользователь является пользователем Телеграм Премиум.
 * @method   bool|null getAddedToAttachmentMenu()   (+) Пользователь добавил бота в меню вложений.
 * @method   bool|null getCanJoinGroups()           (+) Бота можно приглашать в группы. Возвращается только в Api::getMe().
 * @method   bool|null getCanReadAllGroupMessages() (+) Для бота отключен режим приватности. Возвращается только в Api::getMe().
 * @method   bool|null getSupportsInlineQueries()   (+) Бот поддерживает встроенные запросы. Возвращается только в Api::getMe().
 *
 * @method $this setId(int $id)                                        Уникальный идентификатор пользователя или бота.
 * @method $this setIsBot(bool $isBot)                                 Пользователь ботом.
 * @method $this setFirstName(string $firstName)                       Имя пользователя или бота.
 * @method $this setLastName(string $lastName)                         Фамилия пользователя или бота.
 * @method $this setUsername(string $username)                         Юзернейм пользователя или бота.
 * @method $this setLanguageCode(string $languageCode)                 Языковой тег IETF для языка пользователя.
 * @method $this setIsPremium(bool $isPremium)                         Пользователь является пользователем Телеграм Премиум.
 * @method $this setAddedToAttachmentMenu(bool $addedToAttachmentMenu) Пользователь добавил бота в меню вложений.
 */
#[Required([
    'id',
    'is_bot',
    'first_name'
])]
class User extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        int $id,
        bool $isBot,
        string $firstName,
        ?string $lastName = null,
        ?string $username = null,
        ?string $languageCode = null, // https://en.wikipedia.org/wiki/IETF_language_tag
        ?bool $isPremium = null, // true
        ?bool $addedToAttachmentMenu = null // true
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
