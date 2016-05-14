<?php

namespace pKit\System\Patterns\MVC\Templates
{

    use pKit\System\Patterns\MVC\Templates\Managers\TemplateManager;
    use pKit\System\Patterns\MVC\Templates\Variables\TemplateVariableString;
    use pKit\System\Patterns\MVC\Templates\Variables\NullTemplateVariable;
    use pKit\System\Patterns\MVC\Templates\Variables\TemplateVariableCallable;
    use pKit\System\Patterns\MVC\Templates\Variables\NullTemplateVariableCallback;

    final class Template
    {
        private $file;
        private $path;
        private $vars = [];
        private $templateManager;

        private $view = null;

        /**
         * Template constructor.
         * @param string $path
         * @param string $file
         * @param TemplateManager $templateManager
         */
        public function __construct($path, $file, TemplateManager $templateManager)
        {
            $this->file = $file;
            $this->path = $path;
            $this->templateManager = $templateManager;
        }

        /**
         * @return string
         */
        public function getFullPath()
        {
            return $this->file.'/'.$this->path;
        }

        /**
         * @return TemplateManager
         */
        public function getTemplateManager()
        {
            return $this->templateManager;
        }

        /**
         * @param View $view
         */
        public function setView(View $view)
        {
            $this->view = $view;
        }

        /**
         * @return View
         */
        public function getView()
        {
            return $this->view;
        }

        /**
         * @param string $var
         * @param string $val
         */
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

        /**
         * @param string $var
         * @return TemplateVariableString|NullTemplateVariable
         */
        public function __get($var)
        {
            foreach($this->vars as $_var)
            {
                if($_var->getVariable() == $var)
                {
                    return $_var;
                }
            }

            return new NullTemplateVariable($var, $this->file);
        }

        /**
         * @param string $var
         * @param array $args
         * @return mixed|NullTemplateVariableCallback
         */
        public function __call($var, array $args)
        {
            $variable = $this->$var;

            if($variable instanceof NullTemplateVariable)
            {
                return new NullTemplateVariableCallback($var, $this->file, $args);
            }
            else if($variable instanceof TemplateVariableCallable)
            {
                return $variable->call($args);
            }
        }

        /**
         * @param bool $once
         */
        public function display($once = false)
        {

            if($once)
            {
                require_once $this->path.'/'.$this->file;
            }
            else
            {
                require $this->path.'/'.$this->file;
            }
        }
    }
}