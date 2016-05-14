<?php

namespace pKit\System\Patterns\MVC\Controllers\Collectors
{
    use pKit\System\Patterns\MVC\Controllers\Controller;

    final class ControllerCollector
    {
        private $controllers = [];

        public function add(Controller $controller)
        {
            $this->controllers[] = $controller;
        }

        public function getAll()
        {
            return $this->controllers;
        }

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