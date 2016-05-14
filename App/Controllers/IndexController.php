<?php

namespace App\Controllers
{
    use pKit\System\Patterns\MVC\Controllers\Controller;
    use pKit\System\Utils\Routing\Interfaces\IRoute;
    use pKit\System\Utils\Routing\Route;

    final class IndexController extends Controller implements IRoute
    {

        public function onCall(Route $route, $vars)
        {
            echo 1;
        }

        public function getRoutes()
        {
            return [
                new Route('/', $this),
                new Route('/index', $this)
            ];
        }
    }
}