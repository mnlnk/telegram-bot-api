<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет один вариант доставки.
 *
 * @link https://core.telegram.org/bots/api#shippingoption
 *
 * @method         string getId()     Идентификатор варианта доставки.
 * @method         string getTitle()  Название.
 * @method LabeledPrice[] getPrices() Массив объектов частей цены.
 *
 * @method $this setId(string $id)                 Идентификатор варианта доставки.
 * @method $this setTitle(string $title)           Название.
 * @method $this setPrices(LabeledPrice[] $prices) Массив объектов частей цены.
 */
#[Required([
    'id',
    'title',
    'prices'
])]
#[Depends([
    'prices' => [LabeledPrice::class]
])]
class ShippingOption extends Entity
{
    /**
     * Создает объект сущности.
     *
     * @param LabeledPrice[] $prices
     */
    public static function make(
        string $id,
        string $title,
        array $prices
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
