<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    /**
     * Class TemplateVariableCallable
     * @package pKit\System\Patterns\MVC\Templates\Variables
     */
    final class TemplateVariableCallable
    {
        private $var;
        private $callback;

        /**
         * TemplateVariableCallable constructor.
         * @param string $var
         * @param callable $callback
         */
        public function __construct($var, callable $callback)
        {
            $this->var = $var;
            $this->callback = $callback;
        }

        /**
         * @return bool
         */
        public function isNull()
        {
            return false;
        }

        /**
         * @return string
         */
        public function getVariable()
        {
            return $this->var;
        }

        /**
         * @param array $arguments
         * @return mixed
         */
        public function call(array $arguments)
        {
            return call_user_func_array($this->callback, $arguments);
        }
    }
}