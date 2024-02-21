<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет тему форума.
 *
 * @link https://core.telegram.org/bots/api#forumtopic
 *
 * @see IconColor
 *
 * @method         int getMessageThreadId()       Уникальный идентификатор темы форума.
 * @method      string getName()                  Название темы.
 * @method         int getIconColor()             Цвет иконки темы в формате RGB.
 * @method string|null getIconCustomEmojiId() (+) Уникальный идентификатор пользовательского эмоджи, отображаемого в виде иконки темы.
 */
#[Required([
    'message_thread_id',
    'name',
    'icon_color'
])]
class ForumTopic extends Entity
{
    //
}
