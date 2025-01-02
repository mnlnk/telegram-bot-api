<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Inline\Result;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Inline\InlineQueryResultType;
use Manuylenko\Telegram\Bot\Api\Entities\Keyboards\InlineKeyboardMarkup;

/**
 * Представляет игру.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultgame
 *
 * @method                    string getType()              Тип результата.
 * @method                    string getId()                Уникальный идентификатор результата.
 * @method                    string getGameShortName()     Короткое название игры.
 * @method InlineKeyboardMarkup|null getReplyMarkup()   (+) Объект встроенной клавиатуры, прикрепленной к сообщению.
 *
 * @method $this setId(string $id)                                 Уникальный идентификатор результата.
 * @method $this setGameShortName(string $gameShortName)           Короткое название игры.
 * @method $this setReplyMarkup(InlineKeyboardMarkup $replyMarkup) Объект встроенной клавиатуры, прикрепленной к сообщению.
 */
#[Required([
    'type',
    'id',
    'game_short_name'
])]
#[Depends([
    'reply_markup' => InlineKeyboardMarkup::class
])]
class InlineQueryResultResultGame extends InlineQueryResult
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InlineQueryResultType::GAME;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $id,
        string $gameShortName,
        ?InlineKeyboardMarkup $replyMarkup = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
