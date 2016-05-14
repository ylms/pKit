<?php

namespace pKit\System\Patterns\MVC\Models\Handlers
{

    use pKit\System\Patterns\MVC\Models\AbstractFactoryObject;

    final class ModelsManager
    {
        private $cachedModels = [];

        private $connection = null;

        /**
         * ModelsManager constructor.
         * @param \PDO $pdo
         */
        public function __construct(\PDO $pdo)
        {
            $this->connection = $pdo;
        }

        /**
         * @param $instance
         * @param \PDO|null $connection
         * @return AbstractFactory
         */
        public function get($instance, \PDO $connection = null)
        {
            if(isset($this->cachedModels[$instance]))
            {
                return $this->cachedModels[$instance];
            }
            else
            {
                $con = $connection != null ? $connection : $this->connection;
                $model = new $instance($this, $con);

                $this->cachedModels[$instance] = $model;

                return $model;
            }
        }
    }
}