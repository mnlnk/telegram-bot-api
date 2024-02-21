<?php
declare(strict_types=1);

namespace Manuylenko\Telegram\Bot\Api\Exceptions;

class RequiredFieldsException extends EntityException
{
    /**
     * Массив отсутствующих полей сущности.
     *
     * @var string[]
     */
    protected array $fields;


    /**
     * Конструктор.
     *
     * @param string[] $fields
     */
    public function __construct(string $class, array $fields)
    {
        $this->fields = $fields;

        $errors = count($fields);

        for ($i = 0; $i < $errors; $i++) {
            $fields[$i] = '"'.$fields[$i].'"';
        }

        $message  = 'При создании сущности "'.$class.'" ';
        $message .= $errors == 1 ? 'не было указано обязательное поле: ' : 'не были указаны обязательные поля: ';
        $message .= implode(', ', $fields);

        parent::__construct($message);
    }

    /**
     * Получает массив отсутствующих полей.
     *
     * @return string[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
