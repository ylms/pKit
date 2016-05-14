<?php

namespace pKit\System\Patterns\MVC\Templates\Managers
{
    use pKit\System\Patterns\MVC\Templates\Template;

    final class TemplateManager
    {
        private $cachedTemplates = [];

        private $path;

        public function __construct($path)
        {
            $this->path = $path;
        }

        private function create($tpl)
        {
            $tpl = new Template($this->path, $tpl, $this);
            $this->cachedTemplates[] = $tpl;

            return $tpl;
        }

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

        private function exists($tpl)
        {
            return $this->get($tpl) != null;
        }

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