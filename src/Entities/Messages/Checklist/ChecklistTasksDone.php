<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Message;

/**
 * Представляет служебное сообщение о задачах контрольного списка, отмеченных как выполненные или невыполненные.
 *
 * @link https://core.telegram.org/bots/api#checklisttasksdone
 *
 * @method Message|null getChecklistMessage()       (+) Сообщение, содержащее контрольный список, задачи которого отмечены как выполненные или невыполненные.
 * @method   int[]|null getMarkedAsDoneTaskIds()    (+) Массив идентификаторов задач, которые были отмечены как выполненные.
 * @method   int[]|null getMarkedAsNotDoneTaskIds() (+) Массив идентификаторов задач, которые были отмечены как невыполненные.
 *
 * @since 9.1
 */
#[Depends([
    'checklist_message' => Message::class
])]
class ChecklistTasksDone extends Entity
{
    //
}
