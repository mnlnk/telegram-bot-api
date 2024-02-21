<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Game;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Animation;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;
use Manuylenko\Telegram\Bot\Api\Entities\PhotoSize;

/**
 * Представляет игру.
 *
 * @link https://core.telegram.org/bots/api#game
 *
 * @method               string getTitle()            Название игры.
 * @method               string getDescription()      Описание игры.
 * @method          PhotoSize[] getPhoto()            Массив объектов изображения разных размеров, которое отображается в игровом сообщении в чатах.
 * @method          string|null getText()         (+) Краткое описание игры или рекорды включенные в игровое сообщение.
 * @method MessageEntity[]|null getTextEntities() (+) Массив объектов специальных сущностей.
 * @method       Animation|null getAnimation()    (+) Объект анимации, которая отображается в игровом сообщении в чатах.
 */
#[Required([
    'title',
    'description',
    'photo'
])]
#[Depends([
    'photo'  => [PhotoSize::class],
    'text_entities'  => [MessageEntity::class],
    'animation'  => Animation::class
])]
class Game extends Entity
{
    //
}
