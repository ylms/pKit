<?php

namespace pKit\System\Patterns\MVC\Controllers
{
    use pKit\System\App;

    abstract class Controller
    {
        private $controllerParameters;

        public function __construct(ControllerParameters $controllerParameters)
        {
            $this->controllerParameters = $controllerParameters;
        }

        public function getControllerParameters()
        {
            return $this->controllerParameters;
        }
    }
}