<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Direct;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Представляет тему личного чата.
 *
 * @link https://core.telegram.org/bots/api#directmessagestopic
 *
 * @method       int getTopicId()     Уникальный идентификатор темы.
 * @method User|null getUser()    (+) Информация о пользователе, создавшем тему.
 *
 * @since 9.2
 */
#[Required([
    'topic_id'
])]
#[Depends([
    'user' => User::class
])]
class DirectMessagesTopic extends Entity
{
    //
}
