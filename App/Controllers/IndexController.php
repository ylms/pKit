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
            $tpl = $this->getControllerParameters()->getTemplateManager()->make('test.tpl.php');
            $tpl->welcomeMessage = "Hallo Welt!";

            $this->getControllerParameters()->getView()->display($tpl);
        }

        /**
         * @return array
         */
        public function getRoutes()
        {
            return [
                new Route('/')
            ];
        }
    }
}