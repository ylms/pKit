<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class NullViewVariableCallback
    {
        private $var;
        private $args;

        /**
         * NullViewVariableCallback constructor.
         * @param string $var
         * @param array $args
         */
        public function __construct($var, array $args)
        {
            $this->var = $var;
            $this->args = $args;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return '{$this->getView()->'.$this->var.'('.implode(',', $this->args).')}';
        }
    }
}