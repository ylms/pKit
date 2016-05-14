<?php

namespace pKit\System\Utils\Routing\Managers
{
    use pKit\System\Utils\Routing\Collectors\RouteCollector;

    /**
     * Class RouteManager
     * @package pKit\System\Utils\Routing\Managers
     */
    final class RouteManager
    {
        private $routeCollector;

        /**
         * RouteManager constructor.
         * @param RouteCollector $routeCollector
         */
        public function __construct(RouteCollector $routeCollector)
        {
            $this->routeCollector = $routeCollector;
        }

        /**
         * @return RouteCollector
         */
        public function getCollector()
        {
            return $this->routeCollector;
        }
    }
}