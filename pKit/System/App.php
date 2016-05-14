<?php

namespace pKit\System
{
    final class App
    {
        private $config;
        private $connection;

        public function __construct(Config $config, \PDO $connection)
        {
            $this->config = $config;
            $this->connection = $connection;
        }

        public function getConfig()
        {
            return $this->config;
        }

        public function getConnection()
        {
            return $this->connection;
        }
    }
}