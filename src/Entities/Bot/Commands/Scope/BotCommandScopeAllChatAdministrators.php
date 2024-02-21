<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\Scope;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет область применения команд бота, охватывающую всех администраторов групп и супергрупп.
 *
 * @link https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
 *
 * @method string getType() Тип области.
 */
#[Required([
    'type'
])]
class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = BotCommandScopeType::ALL_CHAT_ADMINISTRATORS;

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
