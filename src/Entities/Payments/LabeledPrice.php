<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет часть цены на товары или услуги.
 *
 * @link https://core.telegram.org/bots/api#labeledprice
 *
 * @method string getLabel()  Наименование части цены.
 * @method    int getAmount() Цена продукта в наименьших единицах валюты (целое число, а не число с плавающей запятой/двойное число).
 *
 * @method $this setLabel(string $label) Наименование части цены.
 * @method $this setAmount(int $amount)  Цена продукта в наименьших единицах валюты (целое число, а не число с плавающей запятой/двойное число).
 *
 * @see https://core.telegram.org/bots/payments#supported-currencies
 */
#[Required([
    'label',
    'amount'
])]
class LabeledPrice extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $label,
        int $amount
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
