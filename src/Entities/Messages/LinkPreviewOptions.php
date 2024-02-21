<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет параметры, используемые для создания предварительного просмотра ссылки.
 *
 * @link https://core.telegram.org/bots/api#linkpreviewoptions
 *
 * @method   bool|null getIsDisabled()       (+) Предварительный просмотр ссылки отключен.
 * @method string|null getUrl()              (+) Url-адрес, который будет использоваться для предварительного просмотра ссылки.
 * @method   bool|null getPreferSmallMedia() (+) Медиафайл в предварительном просмотре ссылки будет уменьшен.
 * @method   bool|null getPreferLargeMedia() (+) Медиафайл в предварительном просмотре ссылки будет увеличен.
 * @method   bool|null getShowAboveText()    (+) Предварительный просмотр ссылки должен отображаться над текстом сообщения.
 *
 * @method $this setIsDisabled(bool $isDisabled)             Предварительный просмотр ссылки отключен.
 * @method $this setUrl(string $url)                         Url-адрес, который будет использоваться для предварительного просмотра ссылки.
 * @method $this setPreferSmallMedia(bool $preferSmallMedia) Медиафайл в предварительном просмотре ссылки будет уменьшен.
 * @method $this setPreferLargeMedia(bool $preferLargeMedia) Медиафайл в предварительном просмотре ссылки будет увеличен.
 * @method $this setShowAboveText(bool $showAboveText)       Предварительный просмотр ссылки должен отображаться над текстом сообщения.
 */
class LinkPreviewOptions extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        ?bool $isDisabled = null,
        ?string $url = null,
        ?bool $preferSmallMedia = null,
        ?bool $preferLargeMedia = null,
        ?bool $showAboveText = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
