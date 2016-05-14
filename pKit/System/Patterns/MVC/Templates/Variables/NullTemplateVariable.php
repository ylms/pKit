<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class NullTemplateVariable
    {
        private $var;
        private $file;

        /**
         * NullTemplateVariable constructor.
         * @param string $var
         * @param string $file
         */
        public function __construct($var, $file)
        {
            $this->var = $var;
            $this->file = $file;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return '{'.$this->file.'->$'.$this->var.'}';
        }
    }
}