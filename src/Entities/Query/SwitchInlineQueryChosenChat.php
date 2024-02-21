<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Exceptions\InvalidValueException;

/**
 * Представляет встроенную кнопку, которая переключает текущего пользователя на встроенный режим в выбранном чате с дополнительным встроенным запросом по умолчанию.
 *
 * @link https://core.telegram.org/bots/api#switchinlinequerychosenchat
 *
 * @method string|null getQuery()             (+) Встроенный запрос по умолчанию для вставки в поле ввода.
 * @method   bool|null getAllowUserChats()    (+) Выбрать приватные чаты с пользователями.
 * @method   bool|null getAllowBotChats()     (+) Выбрать приватные чаты с ботами.
 * @method   bool|null getAllowGroupChats()   (+) Выбрать групповые и супергрупповые чаты.
 * @method   bool|null getAllowChannelChats() (+) Выбрать канальные чаты.
 *
 * @method $this setQuery(string $query)                       Встроенный запрос по умолчанию для вставки в поле ввода.
 * @method $this setAllowUserChats(bool $allowUserChats)       Выбрать приватные чаты с пользователями.
 * @method $this setAllowBotChats(bool $allowBotChats)         Выбрать приватные чаты с ботами.
 * @method $this setAllowGroupChats(bool $allowGroupChats)     Выбрать групповые и супергрупповые чаты.
 * @method $this setAllowChannelChats(bool $allowChannelChats) Выбрать канальные чаты.
 */
class SwitchInlineQueryChosenChat extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        ?string $query = null,
        ?bool $allowUserChats = null,
        ?bool $allowBotChats = null,
        ?bool $allowGroupChats = null,
        ?bool $allowChannelChats = null
    ): static
    {
        if ($allowUserChats === null && $allowBotChats === null && $allowGroupChats === null && $allowChannelChats === null) {
            throw new InvalidValueException('Не указан ни один тип чата.');
        }

        return static::fromArgs(func_get_args());
    }
}
