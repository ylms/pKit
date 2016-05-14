<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class NullViewVariableCallback
    {
        private $var;
        private $args;

        public function __construct($var, $args)
        {
            $this->var = $var;
            $this->args = $args;
        }

        public function __toString()
        {
            return '{$this->getView()->'.$this->var.'('.implode(',', $this->args).')}';
        }
    }
}