<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\Scope;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет область применения команд бота по умолчанию.
 *
 * Команды по умолчанию используются, если для пользователя не указаны команды с более узкой областью действия.
 *
 * @link https://core.telegram.org/bots/api#botcommandscopedefault
 *
 * @method string getType() Тип области.
 */
#[Required([
    'type'
])]
class BotCommandScopeDefault extends BotCommandScope
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = BotCommandScopeType::DEFAULT;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        //
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
