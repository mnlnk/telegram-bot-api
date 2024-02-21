<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет ответ сервера.
 *
 * @link https://core.telegram.org/bots/api#making-requests
 *
 * @method                             bool getOk()              Статус выполнения запроса.
 * @method array|string|int|float|bool|null getResult()      (+) Результат запроса.
 * @method                      string|null getDescription() (+) Описание ошибки в удобочитаемом виде.
 * @method                         int|null getErrorCode()   (+) Код ошибки.
 * @method          ResponseParameters|null getParameters()  (+) Объект содержащий дополнительные параметры ошибки.
 */
#[Required([
    'ok'
])]
#[Depends([
    'parameters' => ResponseParameters::class
])]
class Response extends Entity
{
    //
}
