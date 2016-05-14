<?php

namespace pKit\System\Patterns\MVC\Controllers
{
    use pKit\System\App;
    use pKit\System\Patterns\MVC\Controllers\Collectors\ControllerCollector;
    use pKit\System\Patterns\MVC\Templates\Managers\TemplateManager;
    use pKit\System\Patterns\MVC\Templates\View;
    use pKit\System\Patterns\MVC\Models\Handlers\ModelsManager;


    final class ControllerParameters
    {
        private $app;
        private $controllerCollector;
        private $templateManager;
        private $view;
        private $modelsManager;

        public function __construct(App $app, ControllerCollector $controllerCollector, TemplateManager $templateManager, View $view, ModelsManager $modelsManager)
        {
            $this->app = $app;
            $this->controllerCollector = $controllerCollector;
            $this->templateManager = $templateManager;
            $this->view = $view;
            $this->modelsManager = $modelsManager;
        }

        public function getApp()
        {
            return $this->app;
        }

        public function getControllerCollector()
        {
            return $this->controllerCollector;
        }

        public function getTemplateManager()
        {
            return $this->templateManager;
        }

        public function getView()
        {
            return $this->view;
        }

        public function getModelsManager()
        {
            return $this->modelsManager;
        }
    }
}