<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Query\Inline\Content;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Payments\LabeledPrice;

/**
 * Представляет счет на оплату, который будет отправлен в результате встроенного запроса.
 *
 * @link https://core.telegram.org/bots/api#inputinvoicemessagecontent
 *
 * @method         string getTitle()                         Наименование товара.
 * @method         string getDescription()                   Описание товара.
 * @method         string getPayload()                       Полезная нагрузка счета. Эти данные используются для своих внутренних процессов бота.
 * @method    string|null getProviderToken()             (+) Токен платежной системы, полученный через "@BotFather".
 * @method         string getCurrency()                      Трех-буквенный код валюты ISO 4217.
 * @method LabeledPrice[] getPrices()                        Массив объектов цены (например, цена товара, налог, скидка, стоимость доставки, налог на доставку, бонус и т.д.).
 * @method       int|null getMaxTipAmount()              (+) Максимальная допустимая сумма чаевых в наименьших единицах валюты (целое число, а не число с плавающей запятой/удвоение).
 * @method     int[]|null getSuggestedTipAmounts()       (+) Массив рекомендуемых сумм чаевых в наименьших единицах валюты (целое число, а не число с плавающей запятой/двойное число).
 * @method    string|null getProviderData()              (+) Данные о счете, которые должны быть переданы поставщику платежных услуг.
 * @method    string|null getPhotoUrl()                  (+) Url-адрес фотографии товара для счета. Может быть фото товара или маркетинговое изображение услуги.
 * @method       int|null getPhotoSize()                 (+) Размер фото в байтах.
 * @method       int|null getPhotoWidth()                (+) Ширина фото.
 * @method       int|null getPhotoHeight()               (+) Высота фото.
 * @method      bool|null getNeedName()                  (+) Необходимо полное имя пользователя для завершения заказа.
 * @method      bool|null getNeedPhoneNumber()           (+) Необходим номер телефона пользователя для выполнения заказа.
 * @method      bool|null getNeedEmail()                 (+) Необходим адрес электронной почты пользователя для завершения заказа.
 * @method      bool|null getNeedShippingAddress()       (+) Необходим адрес доставки пользователя для завершения заказа.
 * @method      bool|null getSendPhoneNumberToProvider() (+) Номер телефона пользователя должен быть отправлен провайдеру.
 * @method      bool|null getSendEmailToProvider()       (+) Адрес электронной почты пользователя должен быть отправлен поставщику.
 * @method      bool|null getIsFlexible()                (+) Окончательная цена зависит от способа доставки.
 *
 * @method $this setTitle(string $title)                                       Наименование товара.
 * @method $this setDescription(string $description)                           Описание товара.
 * @method $this setPayload(string $payload)                                   Полезная нагрузка счета. Эти данные используются для своих внутренних процессов бота.
 * @method $this setProviderToken(string $providerToken)                       Токен платежной системы, полученный через "@BotFather".
 * @method $this setCurrency(string $currency)                                 Трехбуквенный код валюты ISO 4217.
 * @method $this setPrices(LabeledPrice[] $prices)                             Массив объектов цены (например, цена товара, налог, скидка, стоимость доставки, налог на доставку, бонус и т. д.).
 * @method $this setMaxTipAmount(int $maxTipAmount)                            Максимальная допустимая сумма чаевых в наименьших единицах валюты (целое число, а не число с плавающей запятой/удвоение).
 * @method $this setSuggestedTipAmounts(int[] $suggestedTipAmounts)            Массив рекомендуемых сумм чаевых в наименьших единицах валюты (целое число, а не число с плавающей запятой/двойное число).
 * @method $this setProviderData(string $providerData)                         Данные о счете, которые должны быть переданы поставщику платежных услуг.
 * @method $this setPhotoUrl(string $photoUrl)                                 Url-адрес фотографии товара для счета. Может быть фото товара или маркетинговое изображение услуги.
 * @method $this setPhotoSize(int $photoSize)                                  Размер фото в байтах.
 * @method $this setPhotoWidth(int $photoWidth)                                Ширина фото.
 * @method $this setPhotoHeight(int $photoHeight)                              Высота фото.
 * @method $this setNeedName(bool $needName)                                   Необходимо полное имя пользователя для завершения заказа.
 * @method $this setNeedPhoneNumber(bool $needPhoneNumber)                     Необходим номер телефона пользователя для выполнения заказа.
 * @method $this setNeedEmail(bool $needEmail)                                 Необходим адрес электронной почты пользователя для завершения заказа.
 * @method $this setNeedShippingAddress(bool $needShippingAddress)             Необходим адрес доставки пользователя для завершения заказа.
 * @method $this setSendPhoneNumberToProvider(bool $sendPhoneNumberToProvider) Номер телефона пользователя должен быть отправлен провайдеру.
 * @method $this setSendEmailToProvider(bool $sendEmailToProvider)             Адрес электронной почты пользователя должен быть отправлен поставщику.
 * @method $this setIsFlexible(bool $isFlexible)                               Окончательная цена зависит от способа доставки.
 *
 * @see https://core.telegram.org/bots/payments#supported-currencies
 */
#[Required([
    'title',
    'description',
    'payload',
    'currency',
    'prices'
])]
#[Depends([
    'prices' => [LabeledPrice::class]
])]
class InputInvoiceMessageContent extends InputMessageContent
{
    /**
     * Создает объект сущности.
     *
     * @param LabeledPrice[] $prices
     * @param int[] $suggestedTipAmounts
     */
    public static function make(
        string $title, // 1-32
        string $description, // 1-255
        string $payload, // 1-128
        string $currency, // ISO 4217
        array $prices,
        ?string $providerToken = null,
        ?int $maxTipAmount = null,
        ?array $suggestedTipAmounts = null,
        ?string $providerData = null,
        ?string $photoUrl = null,
        ?int $photoSize = null,
        ?int $photoWidth = null,
        ?int $photoHeight = null,
        ?bool $needName = null,
        ?bool $needPhoneNumber = null,
        ?bool $needEmail = null,
        ?bool $needShippingAddress = null,
        ?bool $sendPhoneNumberToProvider = null,
        ?bool $sendEmailToProvider = null,
        ?bool $isFlexible = null
    ): static
    {
        return static::fromArgs(func_get_args());
    }
}
