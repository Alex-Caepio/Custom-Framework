<?php

namespace Fw\Core;

use Exception;

class Application
{
    use Service\Singleton;

    private object $page;
    private $template;
    private Server $server;
    private Request $request;
    private Session $session;

    private function __construct()
    {
        $this->page = Page::getInstance();
        $this->template = Config::get('templates');
        $this->server = new Server;
        $this->request = new Request;
        $this->session = new Session;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getSession()
    {
        return $this->session;
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
        $replacer = $this->getPage()->replaceAll();
        $content = str_replace(array_keys($replacer), $replacer, $content);
        ob_clean();
        echo $content;
        ob_end_flush();
    }

    public function restartBuffer()
    {
        ob_end_clean();
        ob_start();
    }

    public function includeComponent(string $component, string $template, array $params)
    {
        $componentInfo = explode(":", $component);
        $namespace = $componentInfo[0];
        $id = $componentInfo[1];
        if (!isset($this->__components[$component])) {
            $docpath = $namespace . "\\" . $id . "\\class";
            $file = ($_SERVER['DOCUMENT_ROOT'] . "/" . str_replace("\\", "/", $docpath) . ".php");
            $componentClasses = get_declared_classes();
            if (file_exists($file)) {
                include($file);
            } else {
                throw new Exception("Component not detected. Pleas, check valid of namespace and component's name");
                die;
            }
            $componentFinalClasses = get_declared_classes();
            if (array_diff($componentFinalClasses, $componentClasses) != []) {
                $componentArray = array_values(array_diff($componentFinalClasses, $componentClasses));
                foreach ($componentArray as $componentDiff) {
                    if (get_parent_class($componentDiff) == 'Fw\Core\Component\Base') {
                        $this->__components[$component] = $componentDiff;
                        break;
                    }
                }
            }
        }
        if (get_parent_class($this->__components[$component]) == 'Fw\Core\Component\Base') {
            $example = $this->__components[$component];
        }
        $component = new $example($id, $template, $params);
        $component->executeComponent();
    }
}



