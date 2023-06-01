<?php

use Fw\Core\Application;
use Fw\Core\Component\Base;

class InputTextMultiple extends Base
{
    private $config = "Fw\Components\Forms:Input-text";
    private $app;

    public function __construct($id, $templateId, $params)
    {
        $this->app = Application::getInstance();
        $this->__path = __DIR__;
        $this->params += $params;
        parent::__construct($id, $templateId);
    }

    public function executeComponent()
    {
        ob_start();
        $this->params['name'] .= "[0]";
        $this->app->includeComponent($this->config, $this->template->id, $this->params);
        $this->result["renderedText"] = ob_get_contents();
        ob_clean();
        $this->template->render();
        ob_end_flush();
    }
}