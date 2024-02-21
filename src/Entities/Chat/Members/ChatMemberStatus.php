<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Members;

/**
 * Представляет статусы участников чата.
 *
 * @link https://core.telegram.org/bots/api#chatmember
 */
abstract class ChatMemberStatus
{
    /**
     * Создатель (владелец) чата.
     *
     * @var string
     */
    const CREATOR = 'creator';

    /**
     * Администратор чата.
     *
     * @var string
     */
    const ADMINISTRATOR = 'administrator';

    /**
     * Участник чата.
     *
     * @var string
     */
    const MEMBER = 'member';

    /**
     * Заблокированный в чате.
     *
     * @var string
     */
    const RESTRICTED = 'restricted';

    /**
     * Покинувший чат.
     *
     * @var string
     */
    const LEFT = 'left';

    /**
     * Выгнанный из чата.
     *
     * @var string
     */
    const KICKED = 'kicked';

    # # #

    /**
     * Статусы участников чата.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::CREATOR,
            static::ADMINISTRATOR,
            static::MEMBER,
            static::RESTRICTED,
            static::LEFT,
            static::KICKED
        ];
    }
}
