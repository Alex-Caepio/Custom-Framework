<?php

use Fw\Core\Application;
use Fw\Core\Component\Base;

class InputCheckboxMultiple extends Base
{
    private $config = "Fw\Components\Forms:Input-checkbox";
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
        foreach ($this->params["list"] as $key => $value) {
            $this->params['name'] .= "[$key]";
            $value['name'] = $this->params['name'];
            $this->app->includeComponent($this->config, $this->template->id, $value);
        }
        $this->result["renderedText"] = ob_get_contents();
        ob_clean();
        $this->template->render();
        ob_end_flush();
    }
}