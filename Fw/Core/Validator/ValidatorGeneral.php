<?php

namespace Fw\Core\Validator;

abstract class ValidatorGeneral
{
    private $rule = null;

    public function __construct($rule)
    {
        $this->rule = $rule;
    }

    abstract function validate($value);
}