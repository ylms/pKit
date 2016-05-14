<?php

namespace pKit\System\Utils\Routing\Interfaces
{
    use pKit\System\Utils\Routing\Route;

    interface IRoute
    {
        /**
         * @param Route $route
         * @param array $vars
         * @return mixed
         */
        public function onCall(Route $route, array $vars);

        /**
         * @return array
         */
        public function getRoutes();
    }
}