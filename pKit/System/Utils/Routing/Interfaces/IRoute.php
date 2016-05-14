<?php

namespace pKit\System\Utils\Routing\Interfaces
{
    use pKit\System\Utils\Routing\Route;

    interface IRoute
    {
        public function onCall(Route $route, $vars);
        public function getRoutes();
    }
}