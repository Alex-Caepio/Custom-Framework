<?php

use Fw\Core\Component\Base;

class InputSelectMultiple extends Base
{
    use \Fw\Components\Forms\Traits\Select;

    public function __construct($id, $templateId, $params)
    {
        $this->__path = __DIR__;
        $this->params += $params;
        parent::__construct($id, $templateId);
    }

    public function executeComponent()
    {
        $this->result = $this->getOption();
        $this->template->render();
    }
}