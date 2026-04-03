<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\User;

/**
 * Содержит информацию о боте, который был создан для управления текущим ботом.
 *
 * @link https://core.telegram.org/bots/api#managedbotcreated
 *
 * @method User getBot() Информация о боте. Токен бота можно получить с помощью метода Api::getManagedBotToken().
 */
#[Required([
    'bot'
])]
#[Depends([
    'bot' => User::class
])]
class ManagedBotCreated extends Entity
{
    //
}
