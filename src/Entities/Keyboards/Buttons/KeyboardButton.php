<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\EntityFactory;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions\KeyboardButtonPollType;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions\KeyboardButtonRequestChat;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons\Actions\KeyboardButtonRequestUsers;
use Manuylenko\Telegram\Bot\Api\Entities\WebAppInfo;

/**
 * Представляет кнопку пользовательской клавиатуры.
 *
 * @link https://core.telegram.org/bots/api#keyboardbutton
 *
 * @method                          string getText()                Текст кнопки.
 * @method KeyboardButtonRequestUsers|null getRequestUsers()    (+) Объект запроса пользователя, нажатие на кнопку откроет список подходящих пользователей.
 * @method  KeyboardButtonRequestChat|null getRequestChat()     (+) Объект запроса чата, нажатие на кнопку откроет список подходящих чатов.
 * @method                       bool|null getRequestContact()  (+) Запрос номера телефона пользователя.
 * @method                       bool|null getRequestLocation() (+) Запрос текущего местоположения пользователя.
 * @method     KeyboardButtonPollType|null getRequestPoll()     (+) Объект предложения создать опрос и отправить его боту.
 * @method                 WebAppInfo|null getWebApp()          (+) Объект с описанием веб-приложения.
 *
 * @method $this setText(string $text) Текст кнопки.
 */
#[Required([
    'text'
])]
#[Depends([
    'request_users' => KeyboardButtonRequestUsers::class,
    'request_chat' => KeyboardButtonRequestChat::class,
    'request_poll' => KeyboardButtonPollType::class,
    'web_app' => WebAppInfo::class
])]
class KeyboardButton extends Button
{
    /**
     * Создает объект сущности кнопки.
     */
    public static function make(
        string $text,
        ?string $type = null,
        KeyboardButtonRequestUsers|KeyboardButtonRequestChat|KeyboardButtonPollType|WebAppInfo|bool|null $value = null
    ): static
    {
        $entity = EntityFactory::make(static::class, [
            'text' => $text
        ]);

        if ($type !== null && $value !== null) {
            return $entity->setAction($type, $value);
        }

        return $entity;
    }

    /**
     * Создает кнопку с запросом пользователей, нажатие на кнопку откроет список для выбора подходящих пользователей.
     * Нажатие на любого пользователя отправит его идентификатор боту в служебном сообщении "user_shared".
     * Доступно только в приватных чатах.
     */
    public static function makeRequestUsers(string $text, KeyboardButtonRequestUsers $requestUsers): static
    {
        return static::make($text, KeyboardButtonType::REQUEST_USERS, $requestUsers);
    }

    /**
     * Создает кнопку с запросом чата, нажатие на кнопку откроет список подходящих чатов.
     * При нажатии на чат боту будет отправлен его идентификатор в служебном сообщении "chat_shared".
     * Доступно только в приватных чатах.
     */
    public static function makeRequestChat(string $text, KeyboardButtonRequestChat $requestChat): static
    {
        return static::make($text, KeyboardButtonType::REQUEST_CHAT, $requestChat);
    }

    /**
     * Создает кнопку с запросом номера телефона пользователя.
     * Номер телефона пользователя будет отправлен в качестве контакта при нажатии кнопки.
     * Доступно только в приватных чатах.
     */
    public static function makeRequestContact(string $text): static
    {
        return static::make($text, KeyboardButtonType::REQUEST_CONTACT, true);
    }

    /**
     * Создает кнопку с запросом текущего местоположения пользователя.
     * Текущее местоположение пользователя будет отправлено при нажатии кнопки.
     * Доступно только в приватных чатах.
     */
    public static function makeRequestLocation(string $text): static
    {
        return static::make($text, KeyboardButtonType::REQUEST_LOCATION, true);
    }

    /**
     * Создает кнопку с предложением создать опрос и отправить его боту.
     * Доступно только в приватных чатах.
     */
    public static function makeRequestPoll(string $text, KeyboardButtonPollType $requestPoll): static
    {
        return static::make($text, KeyboardButtonType::REQUEST_POLL, $requestPoll);
    }

    /**
     * Создает кнопку с описанием веб-приложения будет запускаться при нажатии кнопки.
     * Веб-приложение сможет отправлять служебное сообщение "web_app_data".
     * Доступно только в приватных чатах.
     */
    public static function makeWebApp(string $text, WebAppInfo $webApp): static
    {
        return static::make($text, KeyboardButtonType::WEB_APP, $webApp);
    }

    # # #

    /**
     * Тип кнопки.
     */
    public function getType(): ?string
    {
        foreach (KeyboardButtonType::all() as $type) if ($this->has($type)) return $type;

        return null;
    }

    /**
     * Кнопка с запросом пользователей.
     */
    public function isRequestUsers(): bool
    {
        return $this->getType() == KeyboardButtonType::REQUEST_USERS;
    }

    /**
     * Кнопка с запросом чата.
     */
    public function isRequestChat(): bool
    {
        return $this->getType() == KeyboardButtonType::REQUEST_CHAT;
    }

    /**
     * Кнопка с запросом телефонного контакта пользователя.
     */
    public function isRequestContact(): bool
    {
        return $this->getType() == KeyboardButtonType::REQUEST_CONTACT;
    }

    /**
     * Кнопка с запросом текущего местоположения пользователя.
     */
    public function isRequestLocation(): bool
    {
        return $this->getType() == KeyboardButtonType::REQUEST_LOCATION;
    }

    /**
     * Кнопка с предложением создать опрос.
     */
    public function isRequestPool(): bool
    {
        return $this->getType() == KeyboardButtonType::REQUEST_POLL;
    }

    /**
     * Кнопка с описанием веб-приложения.
     */
    public function isWebApp(): bool
    {
        return $this->getType() == KeyboardButtonType::WEB_APP;
    }
}
