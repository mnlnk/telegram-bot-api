<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Stars;

use Manuylenko\Telegram\Bot\Api\Entities\Entity;

/**
 * Представляет рейтинг пользователя, основанный на количестве потраченных им звезд в Телеграм.
 *
 * @method      int getLevel()                  Текущий уровень доверия пользователя, указывающий на его надежность при покупке цифровых товаров и услуг. Более высокий уровень говорит о большей надежности клиента; отрицательный уровень, скорее всего, является поводом для беспокойства.
 * @method      int getRating()                 Числовое значение оценки пользователя; чем выше оценка, тем лучше.
 * @method      int getCurrentLevelRating()     Значение рейтинга, необходимое для достижения текущего уровня.
 * @method int|null getNextLevelRating()    (+) Значение рейтинга, необходимое для перехода на следующий уровень; отсутствует, если достигнут максимальный уровень.
 *
 * @link https://core.telegram.org/bots/api#userrating
 *
 * @since 9.3
 */
class UserRating extends Entity
{
    //
}
