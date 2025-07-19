<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Checklist;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет задачу для добавления в контрольный список.
 *
 * @link https://core.telegram.org/bots/api#inputchecklisttask
 *
 * @method                  int getId()               Уникальный идентификатор задачи.
 * @method               string getText()             Текст задачи.
 * @method          string|null getParseMode()    (+) Режим анализа сущностей в тексте.
 * @method MessageEntity[]|null getTextEntities() (+) Список специальных сущностей, встречающихся в тексте.
 *
 * @method $this setId(int $id)                                 Уникальный идентификатор задачи; должен быть положительным и уникальным среди всех идентификаторов задач, присутствующих в данный момент в контрольном списке.
 * @method $this setText(string $text)                          Текст задачи; 1-100 символов после разбора сущностей.
 * @method $this setParseMode(string $parseMode)                Режим анализа сущностей в тексте.
 * @method $this setTextEntities(MessageEntity[] $textEntities) Список специальных сущностей, встречающихся в тексте, которые можно указать вместо "parse_mode".
 *
 * @since 9.1
 */
#[Required([
    'id',
    'text'
])]
#[Depends([
    'text_entities' => [MessageEntity::class]
])]
class InputChecklistTask extends Entity
{
    /**
     * Создает объект сущности.
     *
     * @param MessageEntity[]|null $textEntities
     */
    public static function make(
        int $id, // > 0
        string $text, // 1-100
        ?string $parseMode = null, // ParseMode::class
        ?array $textEntities = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
