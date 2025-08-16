<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет чат.
 *
 * @link https://core.telegram.org/bots/api#chat
 *
 * @method         int getId()                   Уникальный идентификатор чата.
 * @method      string getType()                 Тип чата.
 * @method string|null getTitle()            (+) Название; для супергрупп, каналов и групповых чатов.
 * @method string|null getUsername()         (+) Юзернейм пользователя; для приватных чатов, супергрупп и каналов, если они доступны.
 * @method string|null getFirstName()        (+) Имя собеседника в приватном чате.
 * @method string|null getLastName()         (+) Фамилия собеседника в приватном чате.
 * @method   bool|null getIsForum()          (+) Супергруппа является форумом (с включенными темами).
 * @method   bool|null getIsDirectMessages() (+) Чат для личных сообщений канала.
 */
#[Required([
    'id',
    'type'
])]
class Chat extends Entity
{
    /**
     * Приватный чат (личный).
     */
    public function isPrivate(): bool
    {
        return $this->getType() == ChatType::PRIVATE;
    }

    /**
     * Группа.
     */
    public function isGroup(): bool
    {
        return $this->getType() == ChatType::GROUP;
    }

    /**
     * Супергруппа.
     */
    public function isSupergroup(): bool
    {
        return $this->getType() == ChatType::SUPERGROUP;
    }

    /**
     * Канал.
     */
    public function isChannel(): bool
    {
        return $this->getType() == ChatType::CHANNEL;
    }

    /**
     * Форум.
     */
    public function isForum(): bool
    {
        return $this->isSupergroup() && $this->getIsForum();
    }
}
