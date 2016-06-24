<?php

namespace pKit\System\Patterns\MVC\Templates
{

    use pKit\System\Patterns\MVC\Templates\Variables\NullVariable;
    use pKit\System\Patterns\MVC\Templates\Variables\NullFunction;

    /**
     * Class View
     * @package pKit\System\Patterns\MVC\Templates
     */
    final class View
    {
        private $vars = [];
        private $functions = [];

        /**
         * @param Template $tpl
         * @param bool $once
         */
        public function display(Template $tpl, $once = false)
        {
            $tpl->setView($this);

            $tpl->display($once);
        }

        /**
         * @param string $var
         * @param mixed $val
         */
        public function __set($var, $val)
        {
            if(is_callable($val))
            {
                $this->functions[$var] = $val;
            }
            else
            {
                $this->vars[$var] = $val;
            }
        }

        /**
         * @param $var
         * @return NullVariable
         */
        public function __get($var)
        {
            if(isset($this->vars[$var]))
            {
                return $this->vars[$var];
            }

            return new NullVariable('View::'.$var);
        }

        /**
         * @param $name
         * @return bool
         */
        public function __isset($name)
        {
            return isset($this->vars[$name]) OR isset($this->functions[$name]);
        }

        /**
         * @param $var
         * @param array $args
         * @return mixed
         */
        public function __call($var, array $args)
        {
            if(isset($this->functions[$var]))
            {
                return call_user_func_array($this->functions[$var], $args);
            }

            return new NullFunction('View::'.$var, $args);
        }
    }
}