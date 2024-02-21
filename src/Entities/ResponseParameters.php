<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

/**
 * Представляет описание, почему запрос был неудачным.
 *
 * @link https://core.telegram.org/bots/api#responseparameters
 *
 * @method int|null getMigrateToChatId() (+) Идентификатор супергруппы, если она была перенесена из группы.
 * @method int|null getRetryAfter()      (+) Время в секундах до повторного запроса, если превышено допустимое количество запросов.
 */
class ResponseParameters extends Entity
{
    //
}
