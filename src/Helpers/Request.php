<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Helpers;

use Manuylenko\CurlWrapper\Curl;
use Manuylenko\CurlWrapper\CurlException;
use Manuylenko\Telegram\Bot\Api\Entities\EntityFactory;
use Manuylenko\Telegram\Bot\Api\Entities\Response;

/**
 * Класс запроса к серверу.
 */
class Request
{
    /**
     * Опции cUrl запроса.
     */
    protected array $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_POST => null,
        CURLOPT_POSTFIELDS => null
    ];

    /**
     * Объект cUrl.
     */
    protected Curl $cUrl;


    /**
     * Конструктор.
     */
    public function __construct(string $url)
    {
        $this->cUrl = new Curl($url);
    }

    /**
     * Отправляет запрос.
     */
    public function send(array $data = []): Response
    {
        if (!empty($data)) {
            $this->options = array_replace($this->options, [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $this->clearData($data)
            ]);
        }

        $this->cUrl->setOptions($this->options);

        $rJson = $this->cUrl->exec();

        if ($rJson === false) {
            throw new CurlException('Не удалось выполнить запрос cUrl', $this->cUrl->errno());
        }

        return EntityFactory::makeFromJson(Response::class, $rJson);
    }

    /**
     * Очищает данные запроса.
     *
     * Удаляет из массива данных пустые значения.
     */
    protected function clearData(array &$data): array
    {
        foreach ($data as $key => $value) {
            if ($value !== null) {
                if (is_array($value)) {
                    $data[$key] = $this->clearData($value);
                }
            } else {
                unset($data[$key]);
            }
        }

        return $data;
    }
}
