<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Location;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет результат встроенного запроса, который был выбран пользователем и отправлен его собеседнику.
 *
 * @link https://core.telegram.org/bots/api#choseninlineresult
 *
 * @method        string getResultId()            Уникальный идентификатор выбранного результата.
 * @method          User getFrom()                Объект пользователя, выбравшего результат.
 * @method Location|null getLocation()        (+) Объект местоположения отправителя; для ботов, которым требуется местоположение пользователя.
 * @method   string|null getInlineMessageId() (+) Идентификатор отправленного встроенного сообщения. Доступно, только если к сообщению подключена встроенная клавиатура. Также будет получен в запросах обратного вызова и может быть использован для редактирования сообщения.
 * @method        string getQuery()               Текст запроса, который использовался для получения результата.
 */
#[Required([
    'result_id',
    'from',
    'query'
])]
#[Depends([
    'from' => User::class,
    'location' => Location::class
])]
class ChosenInlineResult extends Entity implements UpdateContext
{
    //
}
