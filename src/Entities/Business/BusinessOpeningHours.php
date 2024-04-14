<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Business;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет объект времени описывающего часы работы бизнеса.
 *
 * @link https://core.telegram.org/bots/api#businessopeninghours
 *
 * @method                         string getTimeZoneName() Уникальное имя часового пояса, для которого определены часы работы.
 * @method BusinessOpeningHoursInterval[] getOpeningHours() Массив объектов временных интервалов, описывающих часы работы бизнеса.
 */
#[Required([
    'time_zone_name',
    'opening_hours'
])]
#[Depends([
    'opening_hours' => [BusinessOpeningHoursInterval::class]
])]
class BusinessOpeningHours extends Entity
{
    //
}
