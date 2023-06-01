<?php

namespace Fw\Core\Validator;

require_once 'RegExpValidator.php';

class IsNumberValidator extends RegExpValidator
{
    public $rule;

    public function __construct($rule = "/^[0-9]+$/")
    {
        parent::__construct($rule);
        $this->rule = $rule;
    }

    public function validate($value): bool
    {
        if (preg_match($this->rule, $value)) {
            return true;
        }
        return false;
    }
}