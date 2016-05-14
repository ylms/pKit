<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class TemplateVariableCallable
    {
        private $var;
        private $callback;

        public function __construct($var, callable $callback)
        {
            $this->var = $var;
            $this->callback = $callback;
        }

        public function getVariable()
        {
            return $this->var;
        }

        public function call($arguments)
        {
            return call_user_func_array($this->callback, $arguments);
        }
    }
}