<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\EntityFactory;
use Manuylenko\Telegram\Bot\Api\Entities\LoginUrl;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Game\CallbackGame;
use Manuylenko\Telegram\Bot\Api\Entities\Query\SwitchInlineQueryChosenChat;
use Manuylenko\Telegram\Bot\Api\Entities\WebAppInfo;

/**
 * Представляет кнопку встроенной клавиатуры.
 *
 * Допустимо использовать только одно из необязательных полей.
 *
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 *
 * @method                           string getText()                             Текст кнопки.
 * @method                      string|null getUrl()                          (+) Http или tg:// Url-адрес, который будет открыт при нажатии кнопки.
 * @method                      string|null getCallbackData()                 (+) Данные для отправки в callback-запросе боту при нажатии кнопки.
 * @method                  WebAppInfo|null getWebApp()                       (+) Объект с описанием веб-приложения, которое будет запущено, когда пользователь нажмет кнопку.
 * @method                    LoginUrl|null getLoginUrl()                     (+) Объект Url-адреса Https, используемый для автоматической авторизации пользователя.
 * @method                      string|null getSwitchInlineQuery()            (+) Нажатие кнопки предложит пользователю выбрать один из своих чатов, открыть этот чат и вставить юзернейм бота и указанный встроенный запрос в поле ввода.
 * @method                      string|null getSwitchInlineQueryCurrentChat() (+) Нажатие кнопки вставит юзернейм бота и указанный встроенный запрос в поле ввода текущего чата.
 * @method SwitchInlineQueryChosenChat|null getSwitchInlineQueryChosenChat()  (+) Объект предложения пользователю выбрать один из своих чатов указанного типа, открыть этот чат и вставить юзернейм бота и указанный встроенный запрос в поле ввода.
 * @method                CallbackGame|null getCallbackGame()                 (+) Объект с описанием игры, которая будет запущена, когда пользователь нажмет кнопку.
 * @method                        bool|null getPay()                          (+) Предложение оплатить.
 *
 * @method $this setText(string $text) Текст кнопки.
 */
#[Required([
    'text'
])]
#[Depends([
    'web_app' => WebAppInfo::class,
    'login_url' => LoginUrl::class,
    'switch_inline_query_chosen_chat' => SwitchInlineQueryChosenChat::class,
    'callback_game' => CallbackGame::class
])]
class InlineKeyboardButton extends Button
{
    /**
     * Создает объект сущности кнопки.
     */
    public static function make(
        string $text,
        string $type,
        WebAppInfo|LoginUrl|SwitchInlineQueryChosenChat|CallbackGame|string|bool $value
    ): static
    {
        return EntityFactory::make(static::class, [
            'text' => $text,
            $type => $value
        ]);
    }

    /**
     * Создает кнопку с Url-адресом Http или tg://, который будет открыт при нажатии кнопки.
     * Ссылки tg://user?id=user_id можно использовать для упоминания пользователя по его идентификатору без использования имени пользователя,
     * если это разрешено его настройками конфиденциальности.
     */
    public static function makeUrl(string $text, string $url): static
    {
        return static::make($text, InlineKeyboardButtonType::URL, $url);
    }

    /**
     * Создает кнопку с данными, которые будут отправлены в обратном запросе боту при нажатии кнопки, 1–64 байта.
     */
    public static function makeCallbackData(string $text, string $callbackData): static
    {
        return static::make($text, InlineKeyboardButtonType::CALLBACK_DATA, $callbackData);
    }

    /**
     * Создает кнопку с описанием веб-приложения, которое будет запускаться при нажатии пользователем кнопки.
     * Веб-приложение сможет отправлять произвольное сообщение от имени пользователя с помощью метода {@link Api::answerWebAppQuery()}.
     * Доступно только в приватных чатах между пользователем и ботом.
     */
    public static function makeWebApp(string $text, WebAppInfo $webApp): static
    {
        return static::make($text, InlineKeyboardButtonType::WEB_APP, $webApp);
    }

    /**
     * Создает кнопку c Url-адресом (Https), используемым для автоматической авторизации пользователя.
     * Может использоваться в качестве замены виджета входа в Телеграм.
     */
    public static function makeLoginUrl(string $text, LoginUrl $loginUrl): static
    {
        return static::make($text, InlineKeyboardButtonType::LOGIN_URL, $loginUrl);
    }

    /**
     * Создает кнопку с предложением к пользователю выбрать один из своих чатов,
     * открыть этот чат и вставить юзернейм бота и указанный встроенный запрос в поле ввода.
     * Может быть пустым, в этом случае будет вставлен только юзернейм бота.
     */
    public static function makeSwitchIInlineQuery(string $text, string $switchInlineQuery): static
    {
        return static::make($text, InlineKeyboardButtonType::SWITCH_INLINE_QUERY, $switchInlineQuery);
    }

    /**
     * Создает кнопку с предложением вставить юзернейм бота и указанный встроенный запрос в поле ввода текущего чата.
     * Может быть пустым, в этом случае будет вставлен только юзернейм бота.
     */
    public static function makeSwitchInlineQueryCurrentChat(string $text, string $switchInlineQueryCurrentChat): static
    {
        return static::make($text, InlineKeyboardButtonType::SWITCH_INLINE_QUERY_CURRENT_CHAT, $switchInlineQueryCurrentChat);
    }

    /**
     * Создает кнопку с предложением пользователю выбрать один из своих чатов указанного типа,
     * открыть этот чат и вставить юзернейм бота и указанный встроенный запрос в поле ввода.
     */
    public static function makeSwitchInlineQueryChosenChat(string $text, SwitchInlineQueryChosenChat $switchInlineQueryChosenChat): static
    {
        return static::make($text, InlineKeyboardButtonType::SWITCH_INLINE_QUERY_CHOSEN_CHAT, $switchInlineQueryChosenChat);
    }

    /**
     * Создает кнопку с описанием игры, которая будет запускаться при нажатии пользователем кнопки.
     * Кнопка этого типа всегда должна быть первой кнопкой в первом ряду.
     */
    public static function makeCallbackGame(string $text, CallbackGame $callbackGame): static
    {
        return static::make($text, InlineKeyboardButtonType::CALLBACK_GAME, $callbackGame);
    }

    /**
     * Создает кнопку с предложением оплаты.
     * Кнопка этого типа всегда должна быть первой кнопкой в первом ряду и может использоваться только в сообщениях о счетах.
     */
    public static function makePay(string $text): static
    {
        return static::make($text, InlineKeyboardButtonType::PAY, true);
    }

    # # #

    /**
     * Тип кнопки.
     */
    public function getType(): ?string
    {
        foreach (InlineKeyboardButtonType::all() as $type) if ($this->has($type)) return $type;

        return null;
    }

    /**
     * Кнопка с Url-адресом, который будет открыт при нажатии кнопки.
     */
    public function isUrl(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::URL; // 0
    }

    /**
     * Кнопка с данными для отправки в callback-запросе боту при нажатии кнопки.
     */
    public function isCallbackData(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::CALLBACK_DATA; // 1
    }

    /**
     * Кнопка с описанием веб-приложения, которое будет запущено, когда пользователь нажмет кнопку.
     */
    public function isWebApp(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::WEB_APP; // 2
    }

    /**
     * Кнопка авторизации пользователя.
     *
     * @return bool
     */
    public function isLoginUrl(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::LOGIN_URL; // 3
    }

    /**
     * Кнопка с предложением пользователю выбрать один из своих чатов, открыть этот чат и вставить юзернейм бота и указанный встроенный запрос в поле ввода.
     */
    public function isSwitchInlineQuery(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::SWITCH_INLINE_QUERY; // 4
    }

    /**
     * Кнопка с предложением вставить юзернеййма бота и указанный встроенный запрос в поле ввода текущего чата.
     */
    public function isSwitchInlineQueryCurrentChat(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::SWITCH_INLINE_QUERY_CURRENT_CHAT; // 5
    }

    /**
     * Кнопка с предложением пользователю выбрать один из своих чатов указанного типа, открыть этот чат и вставить юзернейм бота и указанный встроенный запрос в поле ввода.
     */
    public function isSwitchInlineQueryChosenChat(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::SWITCH_INLINE_QUERY_CHOSEN_CHAT; // 6
    }

    /**
     * Кнопка с описанием игры, которая будет запущена, когда пользователь нажмет кнопку.
     */
    public function isCallbackGame(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::CALLBACK_GAME;  // 7
    }

    /**
     * Кнопка оплаты.
     */
    public function isPay(): bool
    {
        return $this->getType() == InlineKeyboardButtonType::PAY; // 8
    }
}
