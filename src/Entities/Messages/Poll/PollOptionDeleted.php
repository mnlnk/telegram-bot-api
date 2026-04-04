<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MaybeInaccessibleMessage;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет служебное сообщение об удалении варианта ответа из опроса.
 *
 * @link https://core.telegram.org/bots/api#polloptiondeleted
 *
 * @method MaybeInaccessibleMessage|null getPollMessage()        (+) Сообщение, содержащее опрос, к которому был добавлен этот вариант ответа, если он известен.
 * @method                        string getOptionPersistentId()     Уникальный идентификатор добавленной опции.
 * @method                        string getOptionText()             Текст опции.
 * @method          MessageEntity[]|null getOptionTextEntities() (+) Специальные сущности, которые отображаются в option_text.
 */
#[Required([
    'option_persistent_id',
    'option_text'
])]
#[Depends([
    'poll_message' => MaybeInaccessibleMessage::class,
    'option_text_entities' => [MessageEntity::class]
])]
class PollOptionDeleted extends Entity
{
    //
}
