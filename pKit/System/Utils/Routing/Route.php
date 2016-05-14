<?php

namespace pKit\System\Utils\Routing
{
    use pKit\System\Utils\Routing\Interfaces\IRoute;

    class Route
    {
        private $url;
        private $controller;
        private $data;

        public function __construct($url, IRoute $controller, $data = [])
        {
            $this->url = $url;
            $this->controller = $controller;
            $this->data = $data;
        }

        public function getURL()
        {
            return $this->url;
        }

        public function getController()
        {
            return $this->controller;
        }

        public function getData()
        {
            return $this->data;
        }
    }
}