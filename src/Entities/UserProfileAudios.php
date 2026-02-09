<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\Audio;

/**
 * Представляет аудиозаписи, отображаемые в профиле пользователя.
 *
 * @link https://core.telegram.org/bots/api#userprofileaudios
 *
 * @method     int getTotalCount() Общее количество аудиофайлов профиля пользователя.
 * @method Audio[] getAudios()     Адиофайлы профиля.
 *
 * @since 9.4
 */
#[Required([
    'total_count',
    'audios'
])]
#[Depends([
    'audios' => [Audio::class]
])]
class UserProfileAudios extends Entity
{
    //
}
