<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{
    /**
     * Class TemplateVariableString
     * @package pKit\System\Patterns\MVC\Templates\Variables
     */
    final class TemplateVariableString
    {
        private $variable;
        private $value;

        /**
         * TemplateVariableString constructor.
         * @param string $var
         * @param mixed $val
         */
        public function __construct($var, $val)
        {
            $this->variable = $var;
            $this->value = $val;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return (string) $this->value;
        }

        /**
         * @return string
         */
        public function filter()
        {
            return htmlentities($this->value, ENT_COMPAT, 'utf-8');
        }

        /**
         * @return string
         */
        public function getVariable()
        {
            return $this->variable;
        }

        /**
         * @param string $char
         * @return array
         */
        public function split($char)
        {
            return explode($char, $this->value);
        }

        /**
         * @return int
         */
        public function length()
        {
            return strlen($this->value);
        }

        /**
         * @return string
         */
        public function toUpper()
        {
            return strtoupper($this->value);
        }

        /**
         * @return string
         */
        public function toLower()
        {
            return strtolower($this->value);
        }

        /**
         * @return bool
         */
        public function isNull()
        {
            return is_null($this->value);
        }

        /**
         * @param string $str
         * @return bool
         */
        public function contains($str)
        {
            return substr($str, $this->value) !== 0;
        }
    }
}