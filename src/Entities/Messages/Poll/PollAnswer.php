<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет ответ в опросе.
 *
 * @link https://core.telegram.org/bots/api#pollanswer
 *
 * @method    string getPollId()        Уникальный идентификатор опроса.
 * @method Chat|null getVoterChat() (+) Объект чата, изменившего ответ на опрос, если голосовал анонимный пользователь.
 * @method User|null getUser()      (+) Объект пользователя, изменившего ответ на опрос.
 * @method     int[] getOptionIds()     Идентификаторы вариантов ответов, выбранных пользователем (отсчитываемые от 0). Может быть пустым, если пользователь отозвал свой голос.
 */
#[Required([
    'poll_id',
    'option_ids'
])]
#[Depends([
    'voter_chat' => Chat::class,
    'user' => User::class
])]
class PollAnswer extends Entity implements UpdateContext
{
    //
}
