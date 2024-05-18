<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Types;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Chat\Background\Fill\BackgroundFill;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Document;

/**
 * Представляет фон из паттерна PNG или TGV (подмножество SVG, сжатое в формате gzip с типом MIME «application/x-tgwallpattern»),
 * который можно объединить с фоновой заливкой, выбранной пользователем.
 *
 * @link https://core.telegram.org/bots/api#backgroundtypepattern
 *
 * @method         string getType()           Тип фона.
 * @method       Document getDocument()       Объект файла документа с паттерном.
 * @method BackgroundFill getFill()           Объект фоновой заливки, объединенный с паттерном.
 * @method            int getIntensity()      Интенсивность заполнения фона; 0-100.
 * @method      bool|null getIsInverted() (+) Фоновую заливку нужно применить только к самому узору. Все остальные пиксели в этом случае черные. Только для темных тем.
 * @method      bool|null getIsMoving()   (+) Фон слегка смещается при наклоне устройства.
 */
#[Required([
    'type',
    'document',
    'fill',
    'intensity'
])]
#[Depends([
    'document' => Document::class,
    'fill' => BackgroundFill::class
])]
class BackgroundTypePattern extends BackgroundType
{
    //
}
