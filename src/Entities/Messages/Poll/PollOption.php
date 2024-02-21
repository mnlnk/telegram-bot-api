<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет информацию об одном варианте ответа в опросе.
 *
 * @link https://core.telegram.org/bots/api#polloption
 *
 * @method string getText()       Текст опции.
 * @method string getVoterCount() Количество пользователей, проголосовавших за этот вариант.
 */
#[Required([
    'text',
    'voter_count'
])]
class PollOption extends Entity
{
    //
}
