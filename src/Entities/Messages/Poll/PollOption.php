<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;

/**
 * Представляет информацию об одном варианте ответа в опросе.
 *
 * @link https://core.telegram.org/bots/api#polloption
 *
 * @method               string getText()             Текст опции.
 * @method MessageEntity[]|null getTextEntities() (+) Массив специальных сущностей, которые появляются в тексте варианта (только пользовательские эмодзи).
 * @method               string getVoterCount()       Количество пользователей, проголосовавших за этот вариант.
 */
#[Required([
    'text',
    'voter_count'
])]
#[Depends([
    'text_entities' => [MessageEntity::class]
])]
class PollOption extends Entity
{
    //
}
