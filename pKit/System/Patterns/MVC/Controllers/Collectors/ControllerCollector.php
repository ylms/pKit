<?php

namespace pKit\System\Patterns\MVC\Controllers\Collectors
{
    use pKit\System\Patterns\MVC\Controllers\Controller;

    final class ControllerCollector
    {
        private $controllers = [];

        /**
         * @param Controller $controller
         */
        public function add(Controller $controller)
        {
            $this->controllers[] = $controller;
        }

        /**
         * @return array
         */
        public function getAll()
        {
            return $this->controllers;
        }

        /**
         * @param mixed $instance
         * @return array
         */
        public function getByInstance($instance)
        {
            $result = [];

            foreach($this->controllers as $controller)
            {
                if($controller instanceof $instance)
                {
                    $result[] = $controller;
                }
            }

            return $result;
        }
    }
}