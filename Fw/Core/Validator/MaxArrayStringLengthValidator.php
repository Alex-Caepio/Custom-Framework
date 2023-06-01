<?php

namespace Fw\Core\Validator;

require_once 'ValidatorGeneral.php';

class MaxArrayStringLengthValidator extends ValidatorGeneral
{
    public $rule;

    public function __construct($rule)
    {
        parent::__construct($rule);
        $this->rule = $rule;
    }

    function validate($value): bool
    {
        if (is_string($value)) {
            if (strlen($value) > $this->rule) {
                return false;
            }
            return true;
        }

        if (is_array($value)) {
            foreach ($value as $item) {
                if (strlen($item) > $this->rule) {
                    return false;
                }
            }
            return true;
        }
        return "The value must be a string or an array.";
    }
}