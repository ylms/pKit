<?php

namespace pKit\System\Utils\Routing
{
    /**
     * Class RouterInfo
     * @package pKit\System\Utils\Routing
     */
    final class RouterInfo
    {
        private $route;
        private $state;

        private $parameters = [];

        /**
         * @param int $state
         */
        public function setState($state)
        {
            $this->state = $state;
        }

        /**
         * @param Route $route
         */
        public function setRoute(Route $route)
        {
            $this->route = $route;
        }

        /**
         * @param string $key
         * @param string $val
         */
        public function setParameter($key, $val)
        {
            $this->parameters[$key] = $val;
        }

        /**
         * @return array
         */
        public function getParameters()
        {
            return $this->parameters;
        }

        /**
         * @return mixed
         */
        public function getRoute()
        {
            return $this->route;
        }

        /**
         * @return mixed
         */
        public function getState()
        {
            return $this->state;
        }
    }
}