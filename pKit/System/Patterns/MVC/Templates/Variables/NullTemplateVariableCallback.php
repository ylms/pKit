<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class NullTemplateVariableCallback
    {
        private $var;
        private $file;
        private $args;

        public function __construct($var, $file, $args)
        {
            $this->var = $var;
            $this->file = $file;
            $this->args = $args;
        }

        public function __toString()
        {
            return '{'.$this->file.'->'.$this->var.'('.implode(',', $this->args).')}';
        }
    }
}