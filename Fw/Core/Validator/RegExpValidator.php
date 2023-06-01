<?php

namespace Fw\Core\Validator;

require_once 'ValidatorGeneral.php';

class RegExpValidator extends ValidatorGeneral
{
    public $rule;

    public function __construct($rule)
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