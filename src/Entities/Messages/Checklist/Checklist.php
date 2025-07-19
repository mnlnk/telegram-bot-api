<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет список задач.
 *
 * @link https://core.telegram.org/bots/api#checklist
 *
 * @method               string getTitle()                        Название списка задач.
 * @method MessageEntity[]|null getTitleEntities()            (+) Специальные сущности, указанные в названии списка задач.
 * @method      ChecklistTask[] getTasks()                        Список задач в контрольном списке.
 * @method            bool|null getOthersCanAddTasks()        (+) Пользователи, не являющиеся создателями списка, могут добавлять задачи в список.
 * @method            bool|null getOthersCanMarkTasksAsDone() (+) Пользователи, не являющиеся создателями списка, могут отмечать задачи как выполненные или невыполненные.
 *
 * @since 9.1
 */
#[Required([
    'title',
    'tasks'
])]
#[Depends([
    'title_entities' => [MessageEntity::class],
    'tasks' => [ChecklistTask::class]
])]
class Checklist extends Entity
{
    //
}
