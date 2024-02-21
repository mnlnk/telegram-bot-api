<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет быстрый ответ.
 *
 * @link https://core.telegram.org/bots/api#forcereply
 *
 * @method        bool getForceReply()                Показывать интерфейс ответа пользователю, как если бы он вручную выбрал сообщение бота и нажал "Ответить".
 * @method string|null getInputFieldPlaceholder() (+) Текст подсказки, который будет отображаться в поле ввода, когда ответ активен.
 * @method   bool|null getSelective()             (+) Отвечать только от определенных пользователей.
 *
 * @method $this setInputFieldPlaceholder(string $inputFieldPlaceholder) Текст подсказки, который будет отображаться в поле ввода, когда ответ активен.
 * @method $this setSelective(bool $selective)                           Отвечать только от определенных пользователей.
 */
#[Required([
    'force_reply'
])]
class ForceReply extends KeyboardMarkup
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data = [])
    {
        $data['force_reply'] = true;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        ?string $inputFieldPlaceholder = null,
        ?bool $selective = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
