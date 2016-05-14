<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class NullTemplateVariable
    {
        private $var;
        private $file;

        public function __construct($var, $file)
        {
            $this->var = $var;
            $this->file = $file;
        }

        public function __toString()
        {
            return '{'.$this->file.'->$'.$this->var.'}';
        }
    }
}