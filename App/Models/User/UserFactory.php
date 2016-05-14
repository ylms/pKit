<?php

namespace App\Models\User
{
    use pKit\System\Patterns\MVC\Models\AbstractFactory;
    use pKit\System\Patterns\MVC\Models\Handlers\ModelsManager;

    /**
     * Class UserFactory
     * @package App\Models\User
     */
    final class UserFactory extends AbstractFactory
    {
        /**
         * UserFactory constructor.
         * @param ModelsManager $modelsManager
         * @param \PDO $connection
         */
        public function __construct(ModelsManager $modelsManager, \PDO $connection)
        {
            parent::__construct($modelsManager, $connection, 'users');
        }

        /**
         * @param mixed $row
         * @return User
         */
        public function create($row)
        {
            return new User($row, $this->getConnection(), $this->getModelsManager(), $this->getTable());
        }
    }
}