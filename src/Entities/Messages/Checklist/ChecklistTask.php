<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет задачу в контрольном списке.
 *
 * @link https://core.telegram.org/bots/api#checklisttask
 *
 * @method                  int getId()                  Уникальный идентификатор задачи.
 * @method               string getText()                Текст задачи.
 * @method MessageEntity[]|null getTextEntities()    (+) Специальные сущности, которые появляются в тексте задачи.
 * @method            User|null getCompletedByUser() (+) Пользователь, выполнивший задачу; не указывается, если задача не была выполнена.
 * @method             int|null getCompletionDate()  (+) Момент времени (временная метка Unix), когда задача была завершена; 0, если задача не была завершена.
 *
 * @since 9.1
 */
#[Required([
    'id',
    'text'
])]
#[Depends([
    'text_entities' => [MessageEntity::class],
    'completed_by_user' => User::class
])]
class ChecklistTask extends Entity
{
    //
}
