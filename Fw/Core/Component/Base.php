<?php

namespace Fw\Core\Component;

use Fw\Core\Component\Template as Template;

abstract class Base
{
    public $result = [];
    public $id;
    public $params = [];
    public $template;
    public $__path;

    abstract public function executeComponent();

    public function __construct($id, $templateId)
    {
        $this->id = $id;
        $this->template = new Template($templateId, $this);
    }
}