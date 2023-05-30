<?php

namespace Fw\Core;

class Application
{
    use Service\Singleton;

    private object $page;
    private $template;

    private function __construct()
    {
        $this->page = Page::getInstance();
        $this->template = Config::get('templates');
    }

    public function getPage(): object
    {
        return $this->page;
    }

    public function header()
    {
        $this->startBuffer();
        require_once "Fw/templates/" . $this->template . "/header.php";
    }

    public function footer()
    {
        require_once "Fw/templates/" . $this->template . "/footer.php";
        $this->endBuffer();
    }

    private function startBuffer()
    {
        ob_start();
    }

    private function endBuffer()
    {
        $content = ob_get_contents();
        $content = str_replace(array_keys($this->getPage()->replaceAll()), $this->getPage()->replaceAll(), $content);
        ob_clean();
        echo $content;
        ob_end_flush();
    }

    public function restartBuffer()
    {
        ob_end_clean();
        ob_start();
    }
}



