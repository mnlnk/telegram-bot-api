<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Reaction\Types\ReactionType;

/**
 * Представляет реакцию, добавленную к сообщению.
 *
 * @link https://core.telegram.org/bots/api#reactioncount
 *
 * @method ReactionType getType()       Тип реакции.
 * @method          int getTotalCount() Количество раз, когда добавляли реакцию.
 */
#[Required([
    'type',
    'total_count'
])]
#[Depends([
    'type' => ReactionType::class
])]
class ReactionCount extends Entity
{
    //
}
