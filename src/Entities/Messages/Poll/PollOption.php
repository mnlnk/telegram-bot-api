<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет информацию об одном варианте ответа в опросе.
 *
 * @link https://core.telegram.org/bots/api#polloption
 *
 * @method               string getPersistentId()     Уникальный идентификатор опции, сохраняющийся при добавлении и удалении опции.
 * @method               string getText()             Текст опции.
 * @method MessageEntity[]|null getTextEntities() (+) Массив специальных сущностей, которые появляются в тексте варианта (только пользовательские эмодзи).
 * @method                  int getVoterCount()       Количество пользователей, проголосовавших за этот вариант.
 * @method                 User getAddedByUser()  (+) Пользователь, добавивший опцию; если опция не была добавлена пользователем после создания опроса, она не указывается.
 */
#[Required([
    'persistent_id',
    'text',
    'voter_count'
])]
#[Depends([
    'text_entities' => [MessageEntity::class],
    'added_by_user' => User::class
])]
class PollOption extends Entity
{
    //
}
