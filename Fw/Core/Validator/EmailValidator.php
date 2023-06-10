<?php

namespace Fw\Core\Validator;

require_once 'RegExpValidator.php';

class EmailValidator extends RegExpValidator
{
    public $rule;

    public function __construct($rule = "/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i")
    {
        parent::__construct($rule);
        $this->rule = $rule;
    }

    function validate($value): bool
    {
        if (preg_match($this->rule, $value)) {
            return true;
        }
        return false;
    }
}