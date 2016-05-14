<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    final class TemplateVariableString
    {
        private $variable;
        private $value;

        public function __construct($var, $val)
        {
            $this->variable = $var;
            $this->value = $val;
        }

        public function __toString()
        {
            return (string) $this->value;
        }

        public function filter()
        {
            return htmlentities($this->value, ENT_COMPAT, 'utf-8');
        }

        public function getVariable()
        {
            return $this->variable;
        }

        public function split($char)
        {
            return explode($char, $this->value);
        }

        public function length()
        {
            return strlen($this->value);
        }

        public function toUpper()
        {
            return strtoupper($this->value);
        }

        public function toLower()
        {
            return strtolower($this->value);
        }

        public function contains($str)
        {
            return substr($str, $this->value) !== 0;
        }
    }
}