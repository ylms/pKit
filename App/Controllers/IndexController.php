<?php

namespace App\Controllers
{
    use pKit\System\Patterns\MVC\Controllers\Controller;
    use pKit\System\Utils\Routing\Interfaces\IRoute;
    use pKit\System\Utils\Routing\Route;

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
            if($this->checkAuth(2)) echo "hallo";

            $tpl = $this->getControllerParameters()->getTemplateManager()->make('test.tpl.php');

            $this->getControllerParameters()->getView()->display($tpl);
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