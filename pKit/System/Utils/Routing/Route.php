<?php

namespace pKit\System\Utils\Routing
{
    use pKit\System\Utils\Routing\Interfaces\IRoute;

    /**
     * Class Route
     * @package pKit\System\Utils\Routing
     */
    final class Route
    {
        private $url;
        private $controller;
        private $info;

        /**
         * Route constructor.
         * @param string $url
         * @param IRoute $controller
         * @param array $data
         */
        public function __construct($url, IRoute $controller, $info = [])
        {
            $this->url = $url;
            $this->controller = $controller;
            $this->info = $info;
        }

        /**
         * @return string
         */
        public function getURL()
        {
            return $this->url;
        }

        /**
         * @return IRoute
         */
        public function getController()
        {
            return $this->controller;
        }

        /**
         * @return array
         */
        public function getInfo()
        {
            return $this->info;
        }
    }
}