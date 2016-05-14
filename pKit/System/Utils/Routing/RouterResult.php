<?php

namespace pKit\System\Utils\Routing
{
    final class RouterResult
    {
        private $routerInfo;

        /**
         * RouterResult constructor.
         * @param RouterInfo $info
         */
        public function __construct(RouterInfo $info)
        {
            $this->routerInfo = $info;
        }

        /**
         * @return mixed
         */
        public function getRoute()
        {
            return $this->routerInfo->getRoute();
        }

        /**
         * @return mixed
         */
        public function getState()
        {
            return $this->routerInfo->getState();
        }

        /**
         * @return mixed
         */
        public function callController()
        {
            return $this->routerInfo->getRoute()->getController()->onCall($this->routerInfo->getRoute(), $this->routerInfo->getParameters());
        }
    }
}