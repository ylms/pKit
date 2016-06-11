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

        /**
         * Config constructor.
         * @param object $config
         */
        public function __construct($config)
        {
            if (is_object($config)) {
                $this->config = $config;
            } else {
                throw new pKitException(__DIR__ . '\Config.php', 7, '$config has to be an object, ' . gettype($config) . ' given.');
            }

        }

        /**
         * @return string
         */
        public function getUrlIdentifier()
        {
            return $this->config->URL_IDENTIFIER;
        }

        /**
         * @return string
         */
        public function getVersion()
        {
            return $this->config->VERSION;
        }

        /**
         * @return string
         */
        public function getProjectName()
        {
            return $this->config->PROJECT_NAME;
        }

        /**
         * @return string
         */
        public function getCSRFHash()
        {
            return $this->config->CSRF_HASH;
        }

        /**
         * @return array
         */
        public function getPaths()
        {
            return $this->config->PATHS;
        }

        /**
         * @return array
         */
        public function getDatabaseSettings()
        {
            return $this->config->DATABASE;
        }

        /**
         * @return array
         */
        public function getAutoloaderIgnoringPaths()
        {
            return $this->config->AUTOLOADER->ignore;
        }

        /**
         * @return array
         */
        public function getAutoloaderModifingPaths()
        {
            return $this->config->AUTOLOADER->modify;
        }
    }
}