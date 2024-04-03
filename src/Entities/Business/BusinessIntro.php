<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Business;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers\Sticker;

/**
 * Представляет бизнес-приветствие.
 *
 * @link https://core.telegram.org/bots/api#businessintro
 *
 * @method  string getTitle()   (+) Текст заголовка бизнес-приветствия.
 * @method  string getMessage() (+) Текст сообщения бизнес-приветствия.
 * @method Sticker getSticker() (+) Объект стикера бизнес-приветствия.
 */
#[Depends([
    'sticker' => Sticker::class
])]
class BusinessIntro extends Entity
{
    //
}
