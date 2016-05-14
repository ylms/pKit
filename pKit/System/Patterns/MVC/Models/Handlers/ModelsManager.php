<?php

namespace pKit\System\Patterns\MVC\Models\Handlers
{
    final class ModelsManager
    {
        private $cachedModels = [];

        private $connection = null;

        public function __construct(\PDO $pdo)
        {
            $this->connection = $pdo;
        }

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