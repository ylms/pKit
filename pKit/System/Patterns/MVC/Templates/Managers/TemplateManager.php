<?php

namespace pKit\System\Patterns\MVC\Templates\Managers
{
    use pKit\System\Patterns\MVC\Templates\Template;

    /**
     * Class TemplateManager
     * @package pKit\System\Patterns\MVC\Templates\Managers
     */
    final class TemplateManager
    {
        private $cachedTemplates = [];

        private $path;

        /**
         * TemplateManager constructor.
         * @param string $path
         */
        public function __construct($path)
        {
            $this->path = $path;
        }

        /**
         * @param string $tpl
         * @return Template
         */
        private function create($tpl)
        {
            $tpl = new Template($this->path, $tpl, $this);
            $this->cachedTemplates[] = $tpl;

            return $tpl;
        }

        /**
         * @param string $tpl
         * @return null|Template
         */
        private function get($tpl)
        {
            foreach($this->cachedTemplates as $template)
            {
                if($template->getFile() == $tpl)
                {
                    return $template;
                }
            }

            return null;
        }

        /**
         * @param string $tpl
         * @return bool
         */
        private function exists($tpl)
        {
            return $this->get($tpl) != null;
        }

        /**
         * @param string $file
         * @return null|Template
         */
        public function make($file)
        {
            if(!$this->exists($file))
            {
                $tpl = $this->create($file);
            }
            else
            {
                $tpl = $this->get($file);
            }

            return $tpl;
        }
    }
}