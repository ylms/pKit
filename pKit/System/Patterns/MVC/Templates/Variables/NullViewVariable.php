<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class NullViewVariable extends NullVariable
    {
        private $var;

        /**
         * NullViewVariable constructor.
         * @param string $var
         */
        public function __construct($var)
        {
            $this->var = $var;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return '{$this->getView()->'.$this->var.'}';
        }
    }
}