<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет информацию о цитируемой части сообщения, на которое отвечает сообщение.
 *
 * @link https://core.telegram.org/bots/api#textquote
 *
 * @method               string getText()         Текст цитируемой части сообщения, на которое отвечает данное сообщение.
 * @method MessageEntity[]|null getEntities() (+) Массив объектов специальных сущностей, которые появляются в цитате.
 * @method                  int getPosition()     Приблизительная позиция цитаты в исходном сообщении в кодовых единицах UTF-16, определяемая отправителем.
 * @method            bool|null getIsManual() (+) Цитата была выбрана отправителем сообщения вручную.
 */
#[Required([
    'text',
    'position'
])]
#[Depends([
    'entities' => [MessageEntity::class]
])]
class TextQuote extends Entity
{
    //
}
