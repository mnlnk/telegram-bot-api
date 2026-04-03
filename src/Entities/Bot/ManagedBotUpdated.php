<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Содержит информацию о создании или обновлении токена бота, управляемого текущим ботом.
 *
 * @link https://core.telegram.org/bots/api#managedbotupdated
 *
 * @method User getUser() Пользователь, создавший бота.
 * @method User getBot()  Информация о боте. Токен бота можно получить с помощью метода Api::getManagedBotToken().
 */
#[Required([
    'user',
    'bot'
])]
#[Depends([
    'user' => User::class,
    'bot' => User::class
])]
class ManagedBotUpdated extends Entity
{
    //
}
