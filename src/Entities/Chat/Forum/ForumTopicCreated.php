<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение о создании новой темы форума.
 *
 * @link https://core.telegram.org/bots/api#forumtopiccreated
 *
 * @method      string getName()                  Название темы.
 * @method         int getIconColor()             Цвет иконки темы в формате RGB.
 * @method string|null getIconCustomEmojiId() (+) Уникальный идентификатор пользовательского эмоджи, отображаемого в виде иконки темы.
 */
#[Required([
    'name',
    'icon_color'
])]
class ForumTopicCreated extends Entity
{
    //
}
