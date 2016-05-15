<?php

namespace App\Controllers
{

    use pKit\System\Helpers\Arrays\ArrayList;
    use pKit\System\Helpers\Pagers\Pager;
    use pKit\System\Patterns\MVC\Controllers\Controller;
    use pKit\System\Utils\Routing\Interfaces\IRoute;
    use pKit\System\Utils\Routing\Route;

    use App\Models\User\UserFactory;

    /**
     * Class IndexController
     * @package App\Controllers
     */
    final class IndexController extends Controller implements IRoute
    {
        /**
         * @param Route $route
         * @param array $vars
         */
        public function onCall(Route $route, array $vars)
        {

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