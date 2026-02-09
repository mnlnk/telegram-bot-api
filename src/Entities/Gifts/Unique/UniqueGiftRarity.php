<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Gifts\Unique;

/**
 * Редкость модели.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftmodel
 */
abstract class UniqueGiftRarity
{
    /**
     * Необычный.
     *
     * @var string
     */
    const UNCOMMON = 'uncommon';

    /**
     * Редкий.
     *
     * @var string
     */
    const RARE = 'rare';

    /**
     * Эпический.
     *
     * @var string
     */
    const EPIC = 'epic';

    /**
     * Легендарный.
     *
     * @var string
     */
    const LEGENDARY = 'legendary';
}
