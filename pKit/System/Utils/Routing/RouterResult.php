<?php

namespace pKit\System\Utils\Routing
{
    final class RouterResult
    {
        private $routerInfo;

        public function __construct(RouterInfo $info)
        {
            $this->routerInfo = $info;
        }

        public function getRoute()
        {
            return $this->routerInfo->getRoute();
        }

        public function getState()
        {
            return $this->routerInfo->getState();
        }

        public function callController()
        {
            return $this->routerInfo->getRoute()->getController()->onCall($this->routerInfo->getRoute(), $this->routerInfo->getParameters());
        }
    }
}