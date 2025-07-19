<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет контрольный список, который необходимо создать.
 *
 * @link https://core.telegram.org/bots/api#inputchecklist
 *
 * @method               string getTitle()                        Название контрольного списка.
 * @method          string|null getParseMode()                (+) Режим анализа сущностей в названии контрольного списка.
 * @method MessageEntity[]|null getTitleEntities()            (+) Список специальных сущностей, встречающихся в названии контрольного списка, которые можно указать вместо parse_mode.
 * @method InputChecklistTask[] getTasks()                        Список задач.
 * @method            bool|null getOthersCanAddTasks()        (+) Другие пользователи могут добавлять задачи в контрольный список.
 * @method            bool|null getOthersCanMarkTasksAsDone() (+) Другие пользователи могут отмечать задачи как выполненные или невыполненные.
 *
 * @method $this setTitle(string $title)                                     Название контрольного списка; 1-255 символа после разбора сущностей.
 * @method $this setParseMode(string $parseMode)                             Режим анализа сущностей в названии контрольного списка.
 * @method $this setTitleEntities(MessageEntity[] $titleEntities)            Список специальных сущностей, встречающихся в названии контрольного списка, которые можно указать вместо parse_mode.
 * @method $this setTasks(InputChecklistTask[] $tasks)                       Список задач; должен содержать от 1 до 30 задач.
 * @method $this setOthersCanAddTasks(bool $othersCanAddTasks)               Другие пользователи могут добавлять задачи в контрольный список.
 * @method $this setOthersCanMarkTasksAsDone(bool $othersCanMarkTasksAsDone) Другие пользователи могут отмечать задачи как выполненные или невыполненные.
 *
 * @since 9.1
 */
#[Required([
    'title',
    'tasks'
])]
#[Depends([
    'title_entities' => [MessageEntity::class],
    'tasks' => [InputChecklistTask::class]
])]
class InputChecklist extends Entity
{
    /**
     * Создает объект сущности.
     *
     * @param MessageEntity[]|null $titleEntities
     * @param InputChecklistTask[]|null $tasks
     */
    public static function make(
        string $title, // 1-255
        array $tasks, // 1-30
        ?string $parseMode = null, // ParseMode::class
        ?array $titleEntities = null,
        ?bool $othersCanAddTasks = null,
        ?bool $othersCanMarkTasksAsDone = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
