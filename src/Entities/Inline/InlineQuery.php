<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Location;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет входящий встроенный запрос.
 *
 * Когда пользователь отправляет пустой запрос, ваш бот может вернуть некоторые результаты по умолчанию или тренды.
 *
 * @link https://core.telegram.org/bots/api#inlinequery
 *
 * @method        string getId()           Уникальный идентификатор для этого запроса.
 * @method          User getFrom()         Объект пользователя (отправителя).
 * @method        string getQuery()        Текст запроса.
 * @method        string getOffset()       Смещение возвращаемых результатов может контролироваться ботом.
 * @method   string|null getChatType() (+) Тип чата, из которого был отправлен встроенный запрос.
 * @method Location|null getLocation() (+) Объект местоположения отправителя; для ботов, которым требуется местоположение пользователя.
 */
#[Required([
    'id',
    'from',
    'query',
    'offset'
])]
#[Depends([
    'from' => User::class,
    'location' => Location::class
])]
class InlineQuery extends Entity implements UpdateContext
{
    //
}
