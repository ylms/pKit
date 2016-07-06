<?php

namespace pKit\System\Utils\Routing
{

    use pKit\System\Patterns\MVC\Controllers\Controller;
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
        private $accessType;

        /**
         * Route constructor.
         * @param $url
         * @param int $accessType
         * @param array $info
         */
        public function __construct($url, $accessType = RouteTypes::BOTH, $info = [])
        {
            $this->url = $url;
            $this->accessType = $accessType;
            $this->info = $info;
        }

        /**
         * @return int
         */
        public function getAccessType()
        {
            return $this->accessType;
        }

        /**
         * @param Controller $controller
         */
        public function bindController(Controller $controller)
        {
            $this->controller = $controller;
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