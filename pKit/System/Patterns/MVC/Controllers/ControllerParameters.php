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

        /**
         * ControllerParameters constructor.
         * @param App $app
         * @param ControllerCollector $controllerCollector
         * @param TemplateManager $templateManager
         * @param View $view
         * @param ModelsManager $modelsManager
         */
        public function __construct(App $app, ControllerCollector $controllerCollector, TemplateManager $templateManager, View $view, ModelsManager $modelsManager)
        {
            $this->app = $app;
            $this->controllerCollector = $controllerCollector;
            $this->templateManager = $templateManager;
            $this->view = $view;
            $this->modelsManager = $modelsManager;
        }

        /**
         * @return App
         */
        public function getApp()
        {
            return $this->app;
        }

        /**
         * @return ControllerCollector
         */
        public function getControllerCollector()
        {
            return $this->controllerCollector;
        }

        /**
         * @return TemplateManager
         */
        public function getTemplateManager()
        {
            return $this->templateManager;
        }

        /**
         * @return View
         */
        public function getView()
        {
            return $this->view;
        }

        /**
         * @return ModelsManager
         */
        public function getModelsManager()
        {
            return $this->modelsManager;
        }
    }
}