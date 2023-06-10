<?php

namespace Fw\Core\Validator;

require_once 'RegExpValidator.php';

class PhoneValidator extends RegExpValidator
{
    public $rule;

    public function __construct($rule = "/^0[0-9]{9,10}$/")
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