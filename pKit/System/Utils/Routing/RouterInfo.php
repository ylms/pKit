<?php

namespace pKit\System\Utils\Routing
{
    final class RouterInfo
    {
        private $route;
        private $state;

        private $parameters = [];

        public function setState($state)
        {
            $this->state = $state;
        }

        public function setRoute(Route $route)
        {
            $this->route = $route;
        }

        public function setParameter($key, $val)
        {
            $this->parameters[$key] = $val;
        }

        public function getParameters()
        {
            return $this->parameters;
        }

        public function getRoute()
        {
            return $this->route;
        }

        public function getState()
        {
            return $this->state;
        }
    }
}