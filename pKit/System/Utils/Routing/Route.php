<?php

namespace pKit\System\Utils\Routing
{
    use pKit\System\Utils\Routing\Interfaces\IRoute;

    final class Route
    {
        private $url;
        private $controller;
        private $data;

        /**
         * Route constructor.
         * @param string $url
         * @param IRoute $controller
         * @param array $data
         */
        public function __construct($url, IRoute $controller, $data = [])
        {
            $this->url = $url;
            $this->controller = $controller;
            $this->data = $data;
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
        public function getData()
        {
            return $this->data;
        }
    }
}