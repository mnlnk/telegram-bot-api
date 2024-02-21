<?php
declare(strict_types = 1);

namespace Manuylenko\Telegram\Bot\Api\Entities\Messages\Poll;

use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Depends;
use Manuylenko\Telegram\Bot\Api\Entities\Attributes\Required;
use Manuylenko\Telegram\Bot\Api\Entities\Entity;
use Manuylenko\Telegram\Bot\Api\Entities\Messages\MessageEntity;
use Manuylenko\Telegram\Bot\Api\Entities\UpdateContext;

/**
 * Представляет опрос.
 *
 * @link https://core.telegram.org/bots/api#poll
 *
 * @method               string getId()                        Уникальный идентификатор опроса.
 * @method               string getQuestion()                  Вопрос опроса.
 * @method         PollOption[] getOptions()                   Массив объектов вариантов ответа.
 * @method                  int getTotalVoterCount()           Общее количество пользователей, проголосовавших в опросе.
 * @method                 bool getIsClosed()                  Опрос был закрыт.
 * @method                 bool getIsAnonymous()               Опрос является анонимным.
 * @method               string getType()                      Тип опроса.
 * @method                 bool getAllowsMultipleAnswers()     Опрос допускает выбор нескольких ответов.
 * @method             int|null getCorrectOptionId()       (+) Отсчитываемый от 0 идентификатор правильного варианта ответа.
 * @method          string|null getExplanation()           (+) Текст (подсказка), отображается когда пользователь выбирает неправильный ответ или нажимает значок лампы в викторине.
 * @method MessageEntity[]|null getExplanationEntities()   (+) Объекты специальных сущностей, которые появляются в объяснении. (имена пользователей, URL-адреса, команды ботов и т.д.).
 * @method             int|null getOpenPeriod()            (+) Время в секундах, в течение которого опрос будет активен после создания.
 * @method             int|null getCloseDate()             (+) Метка времени (Unix), когда опрос будет автоматически закрыт.
 */
#[Required([
    'id',
    'question',
    'options',
    'total_voter_count',
    'is_closed',
    'is_anonymous',
    'type',
    'allows_multiple_answers'
])]
#[Depends([
    'options' => [PollOption::class],
    'explanation_entities' => [MessageEntity::class]
])]
class Poll extends Entity implements UpdateContext
{
    /**
     * Викторина.
     */
    public function isQuiz(): bool
    {
        return $this->getType() == PollType::QUIZ;
    }

    /**
     * Простой опрос.
     */
    public function isRegular(): bool
    {
        return $this->getType() == PollType::REGULAR;
    }
}
