<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Input\Profile;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\InputFile;

/**
 * Представляет статичное фото профиля в формате JPG.
 *
 * @link https://core.telegram.org/bots/api#inputprofilephotostatic
 *
 * @method           string getType()  Тип фото профиля.
 * @method InputFile|string getPhoto() Статичное фото профиля.
 *
 * @method $this setPhoto(InputFile|string $photo) Статичное фото профиля.
 */
#[Required([
    'type',
    'photo'
])]
class InputProfilePhotoStatic extends InputProfilePhoto
{
    /**
     * @inheritDoc
     */
    public function __construct(array $data)
    {
        $data['type'] = InputProfilePhotoType::STATIC;

        parent::__construct($data);
    }

    # # #

    /**
     * Создает объект сущности.
     */
    public static function make(
        InputFile|string $photo
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
