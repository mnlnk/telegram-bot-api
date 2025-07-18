<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Chat;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет историю.
 *
 * @link https://core.telegram.org/bots/api#story
 *
 * @method Chat getChat() Объект чата, в котором опубликована история.
 * @method  int getId()   Уникальный идентификатор истории в чате.
 */
#[Required([
    'chat',
    'id'
])]
#[Depends([
    'chat' => Chat::class
])]
class Story extends Entity
{
    //
}
