<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Stickers;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет положение, где маска должна быть размещена по умолчанию.
 *
 * @link https://core.telegram.org/bots/api#maskposition
 *
 * @method string getPoint()  Часть лица, относительно которой должна располагаться маска.
 * @method  float getXShift() Смещение по оси X, измеренное в ширине маски, отмасштабированной к размеру лица, слева направо.
 * @method  float getYShift() Смещение по оси Y, измеренное по высоте маски, отмасштабированной к размеру лица, сверху вниз.
 * @method  float getScale()  Коэффициент масштабирования маски.
 *
 * @method $this setPoint(string $point)  Часть лица, относительно которой должна располагаться маска.
 * @method $this setXShift(float $xShift) Смещение по оси X, измеренное в ширине маски, отмасштабированной к размеру лица, слева направо.
 * @method $this setYShift(float $yShift) Смещение по оси Y, измеренное по высоте маски, отмасштабированной к размеру лица, сверху вниз.
 * @method $this setScale(float $scale)   Коэффициент масштабирования маски.
 */
#[Required([
    'point',
    'x_shift',
    'y_shift',
    'scale'
])]
class MaskPosition extends Entity
{
    /**
     * Создает объект сущности.
     */
    public static function make(
        string $point,
        float $xShift,
        float $yShift,
        float $scale
    ): static
    {
        return static::fromArgs(func_get_args());
    }

    # # #

    /**
     * Маска предназначена для лба.
     */
    public function isForehead(): bool
    {
        return $this->getPoint() == MaskPositionPoint::FOREHEAD;
    }

    /**
     * Маска предназначена для глаз.
     */
    public function isEyes(): bool
    {
        return $this->getPoint() == MaskPositionPoint::EYES;
    }

    /**
     * Маска предназначена для губ.
     */
    public function isMouth(): bool
    {
        return $this->getPoint() == MaskPositionPoint::MOUTH;
    }

    /**
     * Маска предназначена для подбородка.
     */
    public function isChin(): bool
    {
        return $this->getPoint() == MaskPositionPoint::CHIN;
    }
}
