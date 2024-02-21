<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Bot\Commands\Scope;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет область применения команд бота, охватывающую определенного участника группы или супергруппы.
 *
 * @link https://core.telegram.org/bots/api#botcommandscopechatmember
 *
 * @method     string getType()   Тип области.
 * @method int|string getChatId() Уникальный идентификатор чата или юзернейм супергруппы.
 * @method        int getUserId() Уникальный идентификатор указанного пользователя.
 *
 * @method $this setChatId(int|string $chatId) Уникальный идентификатор чата или юзернейм супергруппы (в формате @supergroupusername).
 * @method $this setUserId(int $userId)        Уникальный идентификатор указанного пользователя.
 */
#[Required([
    'type',
    'chat_id',
    'user_id'
])]
class BotCommandScopeChatMember extends BotCommandScope
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['type'] = BotCommandScopeType::CHAT_MEMBER;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        int|string $chatId,
        int $userId
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
