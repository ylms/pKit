<?php

namespace pKit\System\Patterns\MVC\Controllers
{
    use pKit\System\App;

    abstract class Controller
    {
        private $controllerParameters;

        /**
         * Controller constructor.
         * @param ControllerParameters $controllerParameters
         */
        public function __construct(ControllerParameters $controllerParameters)
        {
            $this->controllerParameters = $controllerParameters;
        }

        /**
         * @return ControllerParameters
         */
        public function getControllerParameters()
        {
            return $this->controllerParameters;
        }
    }
}