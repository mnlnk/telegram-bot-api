<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет вариант ответа в опросе.
 *
 * @link https://core.telegram.org/bots/api#inputpolloption
 *
 * @method               string getText()              Текст опции
 * @method          string|null getTextParseMode() (+) Режим разбора специальных сущностей в тексте.
 * @method MessageEntity[]|null getTextEntities()  (+) Массив специальных сущностей, которые появляются в тексте варианта ответа.
 *
 * @method $this setText(string $text)                           Текст опции; 1-100 символов.
 * @method $this setTextParseMode(string $textParseMode)         Режим разбора специальных сущностей в тексте.
 * @method $this setTextEntities(MessageEntity[] $textEntities)  Массив специальных сущностей, которые появляются в тексте варианта ответа.
 */
#[Required([
    'text'
])]
#[Depends([
    'text_entities' => [MessageEntity::class]
])]
class InputPollOption extends Entity
{
    /**
     * Создает объект сущности.
     *
     * @param MessageEntity[]|null $textEntities
     */
    public static function make(
        string $text, // 1-100
        ?string $textParseMode = null, // ParseMode::class
        ?array $textEntities = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
