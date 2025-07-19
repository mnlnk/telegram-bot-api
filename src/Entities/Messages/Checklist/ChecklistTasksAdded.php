<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;

/**
 * Представляет служебное сообщение о задачах, добавленных в контрольный список.
 *
 * @link https://core.telegram.org/bots/api#checklisttasksadded
 *
 * @method    Message|null getChecklistMessage() (+) Сообщение, содержащее контрольный список, в который были добавлены задачи.
 * @method ChecklistTask[] getTasks()                Список задач, добавленных в контрольный список.
 *
 * @since 9.1
 */
#[Required([
    'tasks'
])]
#[Depends([
    'checklist_message' => Message::class,
    'tasks' => [ChecklistTask::class]
])]
class ChecklistTasksAdded extends Entity
{
    //
}
