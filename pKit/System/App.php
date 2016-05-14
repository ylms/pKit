<?php

namespace pKit\System
{
    /**
     * Class App
     * @package pKit\System
     */
    final class App
    {
        
        private $config;
        private $connection;

        /**
         * App constructor.
         * @param Config $config
         * @param \PDO $connection
         */
        public function __construct(Config $config, \PDO $connection)
        {
            $this->config = $config;
            $this->connection = $connection;
        }

        /**
         * @return Config
         */
        public function getConfig()
        {
            return $this->config;
        }

        /**
         * @return \PDO
         */
        public function getConnection()
        {
            return $this->connection;
        }
    }
}