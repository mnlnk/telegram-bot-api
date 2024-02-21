<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Entities;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;

/**
 * Представляет информацию о текущем статусе webhook (веб-перехватчика).
 *
 * @link https://core.telegram.org/bots/api#webhookinfo
 *
 * @method        string getUrl()                              Url-адрес веб-перехватчика, может быть пустым, если веб-перехватчик не настроен.
 * @method          bool getHasCustomCertificate()             Для проверки сертификата веб-перехватчика был предоставлен пользовательский сертификат.
 * @method           int getPendingUpdateCount()               Количество обновлений, ожидающих доставки.
 * @method   string|null getIpAddress()                    (+) Текущий Ip-адрес веб-перехватчика.
 * @method      int|null getLastErrorDate()                (+) Unix-время самой последней ошибки, которая произошла при попытке доставить обновление через веб-перехватчик.
 * @method   string|null getLastErrorMessage()             (+) Сообщение об ошибке в удобочитаемом формате для самой последней ошибки, которая произошла при попытке доставить обновление через веб-перехватчик.
 * @method      int|null getLastSynchronizationErrorDate() (+) Unix-время самой последней ошибки, которая произошла при попытке синхронизировать доступные обновления с центрами обработки данных Телеграм.
 * @method      int|null getMaxConnections()               (+) Максимально допустимое количество одновременных подключений Https к веб-перехватчику для доставки обновлений.
 * @method string[]|null getAllowedUpdates()               (+) Массив типов обновлений, на которые подписан бот. По умолчанию все типы обновлений, кроме UpdateType::CHAT_MEMBER.
 */
#[Required([
    'url',
    'has_custom_certificate',
    'pending_update_count'
])]
class WebhookInfo extends Entity
{
	//
}
