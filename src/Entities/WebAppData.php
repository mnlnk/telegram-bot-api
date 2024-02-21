<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет данные, отправляемые из {@link https://core.telegram.org/bots/webapps веб-приложения} боту.
 *
 * @link https://core.telegram.org/bots/api#webappdata
 *
 * @method string getData()       Данные веб-приложения.
 * @method string getButtonText() Текст кнопки клавиатуры "web_app", с помощью которой было открыто веб-приложение.
 */
#[Required([
    'data',
    'button_text'
])]
class WebAppData extends Entity
{
    //
}
