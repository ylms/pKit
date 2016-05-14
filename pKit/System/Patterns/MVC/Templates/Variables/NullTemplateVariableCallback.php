<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class NullTemplateVariableCallback extends NullVariable
    {
        private $var;
        private $file;
        private $args;

        /**
         * NullTemplateVariableCallback constructor.
         * @param string$var
         * @param string $file
         * @param array $args
         */
        public function __construct($var, $file, array $args)
        {
            $this->var = $var;
            $this->file = $file;
            $this->args = $args;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return '{'.$this->file.'->'.$this->var.'('.implode(',', $this->args).')}';
        }
    }
}