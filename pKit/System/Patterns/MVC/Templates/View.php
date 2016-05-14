<?php

namespace pKit\System\Patterns\MVC\Templates
{
    use pKit\System\Patterns\MVC\Templates\Variables\TemplateVariableString;
    use pKit\System\Patterns\MVC\Templates\Variables\TemplateVariableCallable;
    use pKit\System\Patterns\MVC\Templates\Variables\NullViewVariable;
    use pKit\System\Patterns\MVC\Templates\Variables\NullViewVariableCallback;

    final class View
    {
        private $vars = [];

        public function display(Template $tpl, $once = false)
        {
            $tpl->setView($this);

            $tpl->display($once);
        }

        public function __set($var, $val)
        {
            if(is_callable($val))
            {
                $this->vars[] = new TemplateVariableCallable($var, $val);
            }
            else
            {
                $this->vars[] = new TemplateVariableString($var, $val);
            }
        }

        public function __get($var)
        {
            foreach($this->vars as $_var)
            {
                if($_var->getVariable() == $var)
                {
                    return $_var;
                }
            }

            return new NullViewVariable($var);
        }

        public function __call($var, $args)
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