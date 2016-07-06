<?php

namespace pKit\System\Utils\Routing
{

    use pKit\System\Exceptions\pKitException;
    use pKit\System\Utils\Routing\Managers\RouteManager;
    use pKit\System\Utils\Routing\Helpers\RouteHelper;
    use pKit\System\Utils\Routing\RouteInfoResults;

    /**
     * Class Router
     * @package pKit\System\Utils\Routing
     */
    final class Router
    {
        private $routeManager;

        /**
         * Router constructor.
         * @param RouteManager $routeManager
         */
        public function __construct(RouteManager $routeManager)
        {
            $this->routeManager = $routeManager;
        }

        /*
         * @params string $route
         * @params Callable $callback
         */
        public function listenOn($route, callable $callback)
        {
            if(is_callable($callback))
            {
                $routerInfo = new RouterInfo();

                foreach($this->routeManager->getCollector()->getRoutes() as $_route)
                {
                    if($route == $_route->getURL())
                    {
                        if(!$this->isValidAccessType($_route->getAccessType()))
                        {
                            $routerInfo->setState(RouteInfoResults::ACCESS_DENIED);
                        }
                        else
                        {
                            $routerInfo->setState(RouteInfoResults::ACCESS_ALLOWED);
                        }

                        $routerInfo->setRoute($_route);

                        return $this->prepareRoute($routerInfo, $callback);
                    }
                    else
                    {
                        $comparedUrl = RouteHelper::compareURLtoPattern($route, $_route->getURL());
                        if($comparedUrl['matches'] == true)
                        {
                            foreach($comparedUrl['parameters'] as $param)
                            {
                                $routerInfo->setParameter($param['name'], $param['value']);
                            }

                            if(!$this->isValidAccessType($_route->getAccessType()))
                            {
                                $routerInfo->setState(RouteInfoResults::ACCESS_DENIED);
                            }
                            else
                            {
                                $routerInfo->setState(RouteInfoResults::ACCESS_ALLOWED);
                            }

                            $routerInfo->setRoute($_route);

                            return $this->prepareRoute($routerInfo, $callback);
                        }
                    }
                }

                $routerInfo->setState(RouteInfoResults::NOT_FOUND);
                return $this->prepareRoute($routerInfo, $callback);
            }
            else
            {
                throw new pKitException(__DIR__.'\Route.php', 23, '$callback has to be an instance of object, '.gettype($callback).' given');
            }
        }

        /**
         * @param $type
         * @return bool
         */
        private function isValidAccessType($type)
        {
            switch($type)
            {
                case 1: // POST
                    if($_SERVER['REQUEST_METHOD'] == "POST")
                    {
                        return true;
                    }
                    break;

                case 2: // GET
                    if($_SERVER['REQUEST_METHOD'] == "GET")
                    {
                        return true;
                    }
                    break;

                case 3: // BOTH
                    return true;
                    break;
            }

            return false;
        }

        /**
         * @param string $key
         * @return string
         */
        public function getUrlParameter($key)
        {
            return RouteHelper::getUrl($key);
        }

        /**
         * @param RouterInfo $routerInfo
         * @param callable $callback
         * @return mixed
         */
        private function prepareRoute(RouterInfo $routerInfo, callable $callback)
        {
            $routerResult = new RouterResult($routerInfo);

            return $callback($routerResult);
        }

    }
}