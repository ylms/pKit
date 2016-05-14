<?php

namespace pKit\System\Patterns\MVC\Templates
{
    use pKit\System\Patterns\MVC\Templates\Variables\TemplateVariableString;
    use pKit\System\Patterns\MVC\Templates\Variables\TemplateVariableCallable;
    use pKit\System\Patterns\MVC\Templates\Variables\NullViewVariable;
    use pKit\System\Patterns\MVC\Templates\Variables\NullViewVariableCallback;

    /**
     * Class View
     * @package pKit\System\Patterns\MVC\Templates
     */
    final class View
    {
        private $vars = [];

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
                $this->vars[$var] = new TemplateVariableCallable($var, $val);
            }
            else
            {
                $this->vars[$var] = new TemplateVariableString($var, $val);
            }
        }

        /**
         * @param string $var
         * @return TextVariableString|NullViewVariable
         */
        public function __get($var)
        {
            if(isset($this->vars[$var]))
            {
                return $this->vars[$var];
            }

            return new NullViewVariable($var);
        }

        /**
         * @param string $var
         * @param array $args
         * @return mixed|NullViewVariableCallback
         */
        public function __call($var, array $args)
        {
            $variable = $this->$var;

            if($variable instanceof NullViewVariable)
            {
                return new NullViewVariableCallback($var, $args);
            }
            else if($variable instanceof TemplateVariableCallable)
            {
                return $variable->call($args);
            }
        }
    }
}