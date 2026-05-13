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
 * @method MessageEntity[]|null getQuestionEntities()      (+) Массив специальных сущностей, которые появляются в вопросе (только пользовательские эмодзи).
 * @method         PollOption[] getOptions()                   Массив объектов вариантов ответа.
 * @method                  int getTotalVoterCount()           Общее количество пользователей, проголосовавших в опросе.
 * @method                 bool getIsClosed()                  Опрос был закрыт.
 * @method                 bool getIsAnonymous()               Опрос является анонимным.
 * @method               string getType()                      Тип опроса.
 * @method                 bool getAllowsMultipleAnswers()     Опрос допускает выбор нескольких ответов.
 * @method                 bool getAllowsRevoting()            В опросе предусмотрена возможность изменения выбранных вариантов ответа.
 * @method                 bool getMembersOnly()               Голосование ограничено пользователями, которые являются участниками чата, куда был отправлен опрос.
 * @method        string[]|null getCountryCodes()          (+) Список двухбуквенных кодов стран ISO 3166-1 alpha-2, указывающих страны, из которых пользователи могут голосовать в опросе.
 * @method           int[]|null getCorrectOptionIds()      (+) Массив идентификаторов правильных вариантов ответа, начинающийся с 0.
 * @method          string|null getExplanation()           (+) Текст (подсказка), отображается когда пользователь выбирает неправильный ответ или нажимает значок лампы в викторине.
 * @method MessageEntity[]|null getExplanationEntities()   (+) Объекты специальных сущностей, которые появляются в объяснении (имена пользователей, URL-адреса, команды ботов и т.д.).
 * @method       PollMedia|null getExplanationMedia()      (+) Медиа добавленные в пояснение к викторине.
 * @method             int|null getOpenPeriod()            (+) Время в секундах, в течение которого опрос будет активен после создания.
 * @method             int|null getCloseDate()             (+) Метка времени (Unix), когда опрос будет автоматически закрыт.
 * @method          string|null getDescription()           (+) Описание опроса; только для опросов внутри объекта Message.
 * @method MessageEntity[]|null getDescriptionEntities()   (+) Специальные сущности, такие как имена пользователей, URL-адреса, команды бота и т.д., которые отображаются в описании.
 * @method       PollMedia|null getMedia()                 (+) Медиа добавленное в описание опроса; только для опросов, размещенных внутри объекта Message.
 */
#[Required([
    'id',
    'question',
    'options',
    'total_voter_count',
    'is_closed',
    'is_anonymous',
    'type',
    'allows_multiple_answers',
    'allows_revoting',
    'members_only'
])]
#[Depends([
    'question_entities' => [MessageEntity::class],
    'options' => [PollOption::class],
    'explanation_entities' => [MessageEntity::class],
    'explanation_media' => PollMedia::class,
    'description_entities' => [MessageEntity::class],
    'media' => PollMedia::class
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
