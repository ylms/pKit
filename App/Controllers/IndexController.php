<?php

namespace App\Controllers
{
    use pKit\System\Patterns\MVC\Controllers\Controller;
    use pKit\System\Utils\Routing\Interfaces\IRoute;
    use pKit\System\Utils\Routing\Route;

    final class IndexController extends Controller implements IRoute
    {
        /**
         * @param Route $route
         * @param array $vars
         */
        public function onCall(Route $route, array $vars)
        {
            echo "<pre>";
            var_dump($vars);
        }

        /**
         * @return array
         */
        public function getRoutes()
        {
            return [
                new Route('/', $this),
                new Route('/index', $this),
                new Route('/{string:str}/{bool:boolean}/{int:zahl}/{base64:base}/{float:float}', $this)
            ];
        }
    }
}