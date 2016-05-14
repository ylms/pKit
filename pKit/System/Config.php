<?php

namespace pKit\System {

    use pKit\System\Exceptions\pKitException;

    /**
     * Class Config
     * @package pKit\System
     */
    final class Config
    {
        private $config = [];

        /*
         * @params: object $config
         */
        public function __construct($config)
        {
            if (is_object($config)) {
                $this->config = $config;
            } else {
                throw new pKitException(__DIR__ . '\Config.php', 7, '$config has to be an object, ' . gettype($config) . ' given.');
            }

        }

        /*
         * @returns string
         */
        public function getVersion()
        {
            return $this->config->VERSION;
        }

        /*
         * @returns string
         */
        public function getProjectName()
        {
            return $this->config->PROJECT_NAME;
        }

        /*
         * @returns array
         */
        public function getPaths()
        {
            return $this->config->PATHS;
        }

        /*
         * @returns array
         */
        public function getDatabaseSettings()
        {
            return $this->config->DATABASE;
        }

        /*
         * @returns array
         */
        public function getAutoloaderIgnoringPaths()
        {
            return $this->config->AUTOLOADER->ignore;
        }

        /*
         * @returns array
         */
        public function getAutoloaderModifingPaths()
        {
            return $this->config->AUTOLOADER->modify;
        }
    }
}