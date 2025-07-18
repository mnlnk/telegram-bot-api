<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stories\Area;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет область истории, указывающую на ссылку HTTP или tg://. В настоящее время история может иметь до 3 областей ссылок.
 *
 * @link https://core.telegram.org/bots/api#storyareatypelink
 *
 * @method string getType() Тип области.
 * @method string getUrl()  HTTP или tg:// URL, который будет открываться при нажатии на область.
 *
 * @method $this setUrl(string $url) HTTP или tg:// URL, который будет открываться при нажатии на область.
 */
#[Required([
    'type',
    'url'
])]
class StoryAreaTypeLink extends StoryAreaType
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = StoryAreaType::LINK;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        string $url
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
