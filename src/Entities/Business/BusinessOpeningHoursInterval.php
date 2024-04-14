<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Business;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет объект интервала времени описывающего часы работы бизнеса.
 *
 * @link https://core.telegram.org/bots/api#businessopeninghoursinterval
 *
 * @method int getOpeningMinute() Порядковый номер минуты в неделе, начиная с понедельника, обозначающий начало временного интервала, в течение которого предприятие открыто; 0 - 7*24*60
 * @method int getClosingMinute() Порядковый номер минуты в неделе, начиная с понедельника, обозначающий окончание временного интервала, в течение которого предприятие открыто; 0 - 8*24*60
 */
#[Required([
    'opening_minute',
    'closing_minute'
])]
class BusinessOpeningHoursInterval extends Entity
{
    //
}
