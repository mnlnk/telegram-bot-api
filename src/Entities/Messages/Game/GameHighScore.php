<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Game;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет одну строку из таблицы рекордов игры.
 *
 * @link https://core.telegram.org/bots/api#gamehighscore
 *
 * @method  int getPosition() Позиция в таблице рекордов игры.
 * @method User getUser()     Объект пользователя, которому принадлежит рекорд.
 * @method  int getScore()    Счет игрока.
 */
#[Required([
    'position',
    'user',
    'score'
])]
#[Depends([
    'user' => User::class
])]
class GameHighScore extends Entity
{
    //
}
