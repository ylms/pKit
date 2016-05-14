<?php

namespace pKit\System\Utils\Routing\Collectors
{
    use pKit\System\Exceptions\pKitException;
    use pKit\System\Utils\Routing\Route;

    final class RouteCollector
    {
        private $routes = [];

        /*
         * @params Route $route
         */
        public function add(Route $route)
        {
            if(!$this->exists($route))
            {
                $this->routes[] = $route;
            }
            else
            {
                throw new pKitException(__DIR__.'\RouteCollector.php', 12, 'Cannot add an already existing route', $route);
            }
        }

        /*
         * @params Route $route
         * @returns boolean
         */
        private function exists(Route $route)
        {
            foreach($this->routes as $_route)
            {
                if($route === $_route)
                {
                    return true;
                }
                else if($route->getURL() == $_route->getURL())
                {
                    return true;
                }
            }

            return false;
        }

        /*
         * @returns array
         */
        public function getRoutes()
        {
            return $this->routes;
        }
    }
}