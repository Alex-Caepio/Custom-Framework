<?php

namespace Fw\Core;

class Page
{
    use Service\Singleton;

    private $propertyArray = [];
    private $csslink = [];
    private $jslink = [];
    private $stringArray = [];

    private function getMacros($key)
    {
        return ("#FW_REPLACE_{$key}_MAKRO#");
    }

    public function replaceAll()
    {
        return $this->propertyArray + $this->getJsTag() + $this->getCssTag() + $this->getStringTag();
    }

    public function addJs(string $src)
    {
        $jsname = md5($src);
        $this->jslink[$jsname] = $src;
    }

    public function addCss(string $link)
    {
        $cssname = md5($link);
        $this->csslink[$cssname] = $link;
    }

    public function addString(string $str)
    {
        $strname = md5($str);
        $this->anystring[$strname] = $str;
    }

    public function setProperty(string $key, $value)
    {
        $this->propertyArray[$this->getMacros("PROPERTY_" . $key)] = $value;
    }

    public function getProperty(string $key)
    {
        return $this->propertyArray[$this->getMacros("PROPERTY_" . $key)];
    }

    public function showProperty(string $key)
    {
        echo($this->getMacros("PROPERTY_" . $key));
    }

    private function getJsTag()
    {
        $resultstring = "";
        foreach ($this->jslink as $value) {
            $resultstring .= "<script src=\"$value\"></script>\n";
        }
        return array($this->getMacros("JS") => $resultstring);
    }

    private function getCssTag()
    {
        $resultstring = "";
        foreach ($this->csslink as $value) {
            $resultstring .= "<link href=\"$value\" rel=\"stylesheet\">\n";
        }
        return array($this->getMacros("CSS") => $resultstring);
    }

    private function getStringTag()
    {
        $resultstring = "";
        foreach ($this->stringArray as $value) {
            $resultstring .= $value . "\n";
        }
        return array($this->getMacros("STR") => $resultstring);
    }

    public function showHead()
    {
        echo($this->getMacros("JS") . "\n" . $this->getMacros("CSS") . "\n" . $this->getMacros("STR") . "\n");
    }
}