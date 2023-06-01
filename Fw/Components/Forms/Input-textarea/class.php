<?php

use Fw\Core\Component\Base;

class InputTextarea extends Base
{
    public function __construct($id, $templateId, $params)
    {
        $this->__path = __DIR__;
        $this->params += $params;
        parent::__construct($id, $templateId);
    }

    public function executeComponent()
    {
        $this->template->render();
    }
}