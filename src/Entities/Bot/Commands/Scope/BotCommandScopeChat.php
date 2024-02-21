<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\Scope;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет область применения команд бота для определенного чата.
 *
 * @link https://core.telegram.org/bots/api#botcommandscopechat
 *
 * @method     string getType()   Тип области.
 * @method int|string getChatId() Уникальный идентификатор чата или юзернейм супергруппы.
 *
 * @method $this setChatId(int|string $chatId) Уникальный идентификатор чата или юзернейм супергруппы (в формате @supergroupusername).
 */
#[Required([
    'type',
    'chat_id'
])]
class BotCommandScopeChat extends BotCommandScope
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = BotCommandScopeType::CHAT;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        int|string $chatId
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
