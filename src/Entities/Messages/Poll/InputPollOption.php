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
 */
#[Required([
    'text'
])]
#[Depends([
    'text_entities' => [MessageEntity::class]
])]
class InputPollOption extends Entity
{
    //
}
