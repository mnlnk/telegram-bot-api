<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Forum;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет служебное сообщение о редактируемой теме форума.
 *
 * @link https://core.telegram.org/bots/api#forumtopicedited
 *
 * @method string|null getName()              (+) Новое название темы, если оно редактировалась.
 * @method string|null getIconCustomEmojiId() (+) Новый идентификатор пользовательского эмоджи, отображаемого в виде иконки темы, если он был отредактирован; пустая строка, если иконка была удалена.
 */
class ForumTopicEdited extends Entity
{
    //
}
