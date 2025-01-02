<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons;

/**
 * Представляет типы кнопок встроенной клавиатуры.
 *
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
abstract class InlineKeyboardButtonType
{
    /**
     * Кнопка с Url-адресом, который будет открыт при нажатии кнопки.
     *
     * @var string
     */
    const URL = 'url';

    /**
     * Кнопка с данными для отправки в callback-запросе боту при нажатии кнопки.
     *
     * @var string
     */
    const CALLBACK_DATA = 'callback_data';

    /**
     * Кнопка с описанием веб-приложения, которое будет запущено, когда пользователь нажмет кнопку.
     *
     * @var string
     */
    const WEB_APP = 'web_app';

    /**
     * Кнопка авторизации пользователя.
     *
     * @var string
     */
    const LOGIN_URL = 'login_url';

    /**
     * Кнопка с предложением пользователю выбрать один из своих чатов, открыть этот чат и вставить юзернейм бота и указанный встроенный запрос в поле ввода.
     *
     * @var string
     */
    const SWITCH_INLINE_QUERY = 'switch_inline_query';

    /**
     * Кнопка с предложением вставить юзернейм бота и указанный встроенный запрос в поле ввода текущего чата.
     *
     * @var string
     */
    const SWITCH_INLINE_QUERY_CURRENT_CHAT = 'switch_inline_query_current_chat';

    /**
     * Кнопка с предложением пользователю выбрать один из своих чатов указанного типа, открыть этот чат и вставить юзернейм бота и указанный встроенный запрос в поле ввода.
     *
     * @var string
     */
    const SWITCH_INLINE_QUERY_CHOSEN_CHAT = 'switch_inline_query_chosen_chat';

    /**
     * Кнопка, копирующая указанный текст в буфер обмена.
     *
     * @var string
     */
    const COPY_TEXT = 'copy_text';

    /**
     * Кнопка с описанием игры, которая будет запущена, когда пользователь нажмет кнопку.
     *
     * @var string
     */
    const CALLBACK_GAME = 'callback_game';

    /**
     * Кнопка оплаты.
     *
     * @var string
     */
    const PAY = 'pay';

    # # #

    /**
     * Типы кнопок встроенной клавиатуры.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::URL,
            static::CALLBACK_DATA,
            static::WEB_APP,
            static::LOGIN_URL,
            static::SWITCH_INLINE_QUERY,
            static::SWITCH_INLINE_QUERY_CURRENT_CHAT,
            static::SWITCH_INLINE_QUERY_CHOSEN_CHAT,
            static::COPY_TEXT,
            static::CALLBACK_GAME,
            static::PAY
        ];
    }
}
