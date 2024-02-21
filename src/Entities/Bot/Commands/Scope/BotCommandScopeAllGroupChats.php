<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\Scope;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет область применения команд бота, охватывающую чаты всех групп и супергрупп.
 *
 * @link https://core.telegram.org/bots/api#botcommandscopeallgroupchats
 *
 * @method string getType() Тип области.
 */
#[Required([
    'type'
])]
class BotCommandScopeAllGroupChats extends BotCommandScope
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = BotCommandScopeType::ALL_GROUP_CHATS;

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
