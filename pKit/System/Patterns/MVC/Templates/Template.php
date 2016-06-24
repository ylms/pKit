<?php

namespace pKit\System\Patterns\MVC\Templates
{

    use pKit\System\Patterns\MVC\Templates\Managers\TemplateManager;
    use pKit\System\Patterns\MVC\Templates\Variables\NullVariable;
    use pKit\System\Patterns\MVC\Templates\Variables\NullFunction;

    /**
     * Class Template
     * @package pKit\System\Patterns\MVC\Templates
     */
    final class Template
    {
        private $file;
        private $path;
        private $vars = [];
        private $functions = [];
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
                $this->functions[$var] = $val;
            }
            else
            {
                $this->vars[$var] = $val;
            }
        }

        /**
         * @param string $var
         * @return mixed|NullFunction
         */
        public function __get($var)
        {
            if(isset($this->vars[$var]))
            {
                return $this->vars[$var];
            }

            return new NullVariable($var);
        }

        /**
         * @param string $var
         * @param array $args
         * @return mixed|NullFunction
         */
        public function __call($var, array $args)
        {
            if(isset($this->functions[$var]))
            {
                return call_user_func_array($this->functions[$var], $args);
            }

            return new NullFunction($var, $args);
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