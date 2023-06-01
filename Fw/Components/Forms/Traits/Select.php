<?php

namespace Fw\Components\Forms\Traits;

trait Select
{
    private function getOption()
    {
        $resultOption = '';
        foreach ($this->params['list'] as $value) {
            if (isset($value['selected']) && $value['selected'] == true) {
                $resultOption .= ("<option selected value=\"" . $value['value'] . "\" class = \"" . $value['additional_class'] . "\" id=\"" . $value['attr']['data-id'] . "\">" . $value['title'] . "</option>");
            } else {
                $resultOption .= ("<option value=\"" . $value['value'] . "\" class = \"" . $value['additional_class'] . "\" id=\"" . $value['attr']['data-id'] . "\">" . $value['title'] . "</option>");
            }
        }
        return $resultOption;
    }
}