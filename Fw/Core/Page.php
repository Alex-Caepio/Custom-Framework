<?php

namespace Fw\Core;


class Page
{
    use Container\Singleton;

    private $propertyArray = [];
    private $csslink = [];
    private $jslink = [];
    private $stringArray = [];

    public function getMacros(string $key)
    {
        return $this->getProperty($key);
    }

    public function replaceAll(): array
    {
        return array_merge($this->propertyArray, $this->getCssTag(), $this->getJsTag(), $this->getStringTag());
    }

    public function getString(): array
    {
        return $this->stringArray;
    }

    public function addCss(string $src): void
    {
        $cssname = md5($src);
        $this->csslink[$cssname] = $src;
    }

    public function addJS(string $src): void
    {
        $jsname = md5($src);
        $this->jslink[$jsname] = $src;
    }

    private function addString(string $key, string $value): void
    {
        $this->stringArray[$key] = $value;
    }

    public function getProperty(string $key): string
    {
        return $this->$key;
    }

    public function setProperty(string $key, $value): void
    {
        $this->$key = $value;
    }

    public function showProperty(string $key): string
    {
        return $this->getProperty($key);
    }

    public function getCssTag(): array
    {
        $css = $this->csslink;
        $cssTag = '';
        foreach ($css as $value) {
            $cssTag .= '<link rel="stylesheet" href="' . $value . '">';
        }
        return array($this->getMacros('FW_CSS'), $cssTag);
    }

    public function getStringTag(): array
    {
        $string = $this->stringArray;
        $stringTag = '';
        foreach ($string as $value) {
            $stringTag .= $value;
        }
        return array($this->getMacros('FW_STRING'), $stringTag);
    }

    public function getJsTag(): array
    {
        $js = $this->jslink;
        $jsTag = '';
        foreach ($js as $value) {
            $jsTag .= '<script src="' . $value . '"></script>';
        }
        return array($this->getMacros('FW_JS'), $jsTag);
    }

    public function showHead(): string
    {
        return $this->getMacros('FW_CSS') . '<br/>' . $this->getMacros('FW_STRING') . '<br/>' . $this->getMacros('FW_JS');
    }
}