<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Payments;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет основную информацию о счете-фактуре.
 *
 * @link https://core.telegram.org/bots/api#invoice
 *
 * @method string getTitle()          Наименование товара.
 * @method string getDescription()    Описание товара.
 * @method string getStartParameter() Уникальный параметр глубокой связи бота, который можно использовать для создания этого счета.
 * @method string getCurrency()       Трех-буквенный код валюты (ISO 4217).
 * @method    int getTotalAmount()    Общая цена в наименьших единицах валюты (целое число, а не число с плавающей запятой/двойное число).
 *
 * @see https://core.telegram.org/bots/payments#supported-currencies
 */
#[Required([
    'title',
    'description',
    'start_parameter',
    'currency',
    'total_amount'
])]
class Invoice extends Entity
{
	//
}
