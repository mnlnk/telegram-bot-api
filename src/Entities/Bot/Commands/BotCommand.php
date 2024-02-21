<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет команду бота.
 *
 * @link https://core.telegram.org/bots/api#botcommand
 *
 * @method string getCommand()     Текст команды.
 * @method string getDescription() Описание команды.
 *
 * @method $this setCommand(string $command)         Текст команды.
 * @method $this setDescription(string $description) Описание команды.
 */
#[Required([
    'command',
    'description'
])]
class BotCommand extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $command, // 1-32
        string $description // 1-256
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
