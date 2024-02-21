<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Exceptions;

use Manuylenko\Telegram\Bot\Api\Entities\Response;

class ResponseException extends TelegramBotException
{
    /**
     * Объект ответа.
     */
    protected Response $response;

    # # #

    /**
     * Конструктор.
     */
    public function __construct(Response $response)
    {
        $this->response = $response;

        parent::__construct((string) $response->getDescription(), (int) $response->getErrorCode());
    }

    /**
     * Экземпляр объекта ответа.
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}
