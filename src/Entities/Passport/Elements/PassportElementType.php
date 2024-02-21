<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Passport\Elements;

/**
 * Представляет типы элементов Телеграм Паспорт.
 *
 * @link https://core.telegram.org/bots/api#telegram-passport
 */
abstract class PassportElementType
{
    /**
     * Персональная информация.
     *
     * @var string
     */
    const PERSONAL_DETAILS = 'personal_details';

    /**
     * Паспорт.
     *
     * @var string
     */
    const PASSPORT = 'passport';

    /**
     * Водительское удостоверение.
     *
     * @var string
     */
    const DRIVER_LICENSE = 'driver_license';

    /**
     * Удостоверение личности.
     *
     * @var string
     */
    const IDENTITY_CARD = 'identity_card';

    /**
     * Внутренний паспорт.
     *
     * @var string
     */
    const INTERNAL_PASSPORT = 'internal_passport';

    /**
     * Адрес.
     *
     * @var string
     */
    const ADDRESS = 'address';

    /**
     * Счет за коммунальные услуги.
     *
     * @var string
     */
    const UTILITY_BILL = 'utility_bill';

    /**
     * Выписка из банка.
     *
     * @var string
     */
    const BANK_STATEMENT = 'bank_statement';

    /**
     * Договор аренды.
     *
     * @var string
     */
    const RENTAL_AGREEMENT = 'rental_agreement';

    /**
     * Регистрация (прописка).
     *
     * @var string
     */
    const PASSPORT_REGISTRATION = 'passport_registration';

    /**
     * Временная регистрация (прописка).
     *
     * @var string
     */
    const TEMPORARY_REGISTRATION = 'temporary_registration';

    /**
     * Номер телефона.
     *
     * @var string
     */
    const PHONE_NUMBER = 'phone_number';

    /**
     * Адрес электронной почты.
     *
     * @var string
     */
    const EMAIL = 'email';

    # # #

    /**
     * Типы элементов Телеграм Паспорт.
     *
     * @return string[]
     */
    public static function all(): array
    {
        return [
            static::PERSONAL_DETAILS,
            static::PASSPORT,
            static::DRIVER_LICENSE,
            static::IDENTITY_CARD,
            static::INTERNAL_PASSPORT,
            static::ADDRESS,
            static::UTILITY_BILL,
            static::BANK_STATEMENT,
            static::RENTAL_AGREEMENT,
            static::PASSPORT_REGISTRATION,
            static::TEMPORARY_REGISTRATION,
            static::PHONE_NUMBER,
            static::EMAIL
        ];
    }
}
