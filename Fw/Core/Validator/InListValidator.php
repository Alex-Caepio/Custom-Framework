<?php

namespace Fw\Core\Validator;

require_once 'ValidatorGeneral.php';

class InListValidator extends ValidatorGeneral
{
    public $rule;

    public function __construct($rule)
    {
        parent::__construct($rule);
        $this->rule = $rule;
    }

    function validate($value): bool
    {
        if (is_array($this->rule)) {
            if (in_array($value, $this->rule)) {
                return true;
            }
            return false;
        }
    }
}