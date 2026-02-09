<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Keyboards\Buttons;

/**
 * Стили кнопок.
 *
 * @link https://core.telegram.org/bots/api#keyboardbutton
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
abstract class ButtonStyle
{
    /**
     * Красная.
     *
     * @var string
     */
    const DANGER = 'danger';

    /**
     * Зеленая.
     *
     * @var string
     */
    const SUCCESS = 'success';

    /**
     * Синяя.
     *
     * @var string
     */
    const PRIMARY = 'primary';
}
