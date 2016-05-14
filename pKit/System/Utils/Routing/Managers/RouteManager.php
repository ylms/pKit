<?php

namespace pKit\System\Utils\Routing\Managers
{
    use pKit\System\Utils\Routing\Collectors\RouteCollector;

    final class RouteManager
    {
        private $routeCollector;

        public function __construct(RouteCollector $routeCollector)
        {
            $this->routeCollector = $routeCollector;
        }

        public function getCollector()
        {
            return $this->routeCollector;
        }
    }
}