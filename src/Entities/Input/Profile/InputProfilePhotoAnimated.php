<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Profile;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;

/**
 * Представляет анимированное фото профиля в формате MPEG4.
 *
 * @link https://core.telegram.org/bots/api#inputprofilephotoanimated
 *
 * @method           string getType()                   Тип фото профиля.
 * @method InputFile|string getAnimation()              Анимированное фото профиля.
 * @method       float|null getMainFrameTimestamp() (+) Временная метка кадра, который будет использоваться в качестве статического фото профиля; (в секундах).
 *
 * @method $this setAnimation(InputFile|string $animation)        Анимированное фото профиля.
 * @method $this setMainFrameTimestamp(float $mainFrameTimestamp) Временная метка кадра, который будет использоваться в качестве статического фото профиля; (в секундах).
 */
#[Required([
    'type',
    'animation'
])]
class InputProfilePhotoAnimated extends InputProfilePhoto
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputProfilePhotoType::ANIMATED;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        InputFile|string $animation,
        ?float $mainFrameTimestamp = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
