<?php

namespace App\Models\User
{
    use pKit\System\Patterns\MVC\Models\AbstractFactory;
    use pKit\System\Patterns\MVC\Models\Handlers\ModelsManager;

    final class UserFactory extends AbstractFactory
    {
        public function __construct(ModelsManager $modelsManager, \PDO $connection)
        {
            parent::__construct($modelsManager, $connection, 'users');
        }

        public function create($row)
        {
            return new User($row, $this->getConnection(), $this->getModelsManager(), $this->getTable());
        }
    }
}