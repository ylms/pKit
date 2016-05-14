<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class NullViewVariable
    {
        private $var;

        public function __construct($var)
        {
            $this->var = $var;
        }

        public function __toString()
        {
            return '{$this->getView()->'.$this->var.'}';
        }
    }
}