<?php

namespace Fw\Core\Component;

use Fw\Core\Page as Page;

class Template
{
    public $__component;
    public $__path;
    public $__relativePath;
    public $id;

    public function __construct($idTemplate, $componentObj)
    {
        $this->__component = $componentObj;
        $this->id = $idTemplate;
        $this->__path = $this->__component->__path . "/templates/" . $idTemplate . "/";
        $this->__relativePath = $this->getURL();
    }

    private function getURL()
    {
        $position = stripos($this->__path, "Fw");
        $pathArray = str_split($this->__path);
        $url = "";
        foreach ($pathArray as $key => $value) {
            if ($key >= $position) {
                $url .= $value;
            }
        }
        return $url;
    }

    public function render($page = "template")
    {
        $params = $this->__component->params;
        $result = $this->__component->result;

        $pagerComponent = Page::getInstance();

        if (file_exists($this->__path . "result_modifier.php")) {
            include $this->__path . "result_modifier.php";
        }

        if (file_exists($this->__path . $page . ".php")) {
            include $this->__path . $page . ".php";
        }

        if (file_exists($this->__path . "component_var_dumper.php")) {
            include $this->__path . "var_dumper.php";
        }

        if (file_exists($this->__path . "script.js")) {
            $pagerComponent->addJs($this->__relativePath . "script.js");
        }

        if (file_exists($this->__path . "style.css")) {
            $pagerComponent->addCss($this->__relativePath . "style.css");
        }
    }
}