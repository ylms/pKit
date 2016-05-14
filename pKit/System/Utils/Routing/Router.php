<?php

namespace pKit\System\Utils\Routing
{

    use pKit\System\Exceptions\pKitException;
    use pKit\System\Utils\Routing\Managers\RouteManager;
    use pKit\System\Utils\Routing\Helpers\RouteHelper;
    use pKit\System\Utils\Routing\RouteInfoResults;

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
                        $routerInfo->setState(RouteInfoResults::ACCESS_ALLOWED);
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

                            $routerInfo->setState(RouteInfoResults::ACCESS_ALLOWED);
                            $routerInfo->setRoute($_route);

                            return $this->PrepareRoute($routerInfo, $callback);
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