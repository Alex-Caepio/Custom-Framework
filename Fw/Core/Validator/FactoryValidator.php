<?php

namespace Fw\Core\Validator;

require_once 'MinLengthValidator.php';
require_once 'RegExpValidator.php';
require_once 'EmailValidator.php';
require_once 'MaxArrayStringLengthValidator.php';
require_once 'IsNumberValidator.php';
require_once 'PhoneValidator.php';
require_once 'InListValidator.php';

class FactoryValidator
{
    public function MinLength($rule)
    {
        return new MinLengthValidator($rule);
    }

    public function RegExp($rule)
    {
        return new RegExpValidator($rule);
    }

    public function Email()
    {
        return new EmailValidator();
    }

    public function MaxLength($rule)
    {
        return new MaxArrayStringLengthValidator($rule);
    }

    public function number()
    {
        return new IsNumberValidator();
    }

    public function phone()
    {
        return new PhoneValidator();
    }

    public function inList($rule)
    {
        return new InListValidator($rule);
    }
}

$factoryValidator = new FactoryValidator();

$validator = $factoryValidator->MinLength(5);
$result = $validator->validate("php");

var_dump($result);

$validator = $factoryValidator->RegExp("/^[a-z]{6,}$/");
$result = $validator->validate("php");

var_dump($result);

$validator = $factoryValidator->Email();
$result = $validator->validate("php@mail.com");

var_dump($result);

$validator = $factoryValidator->MaxLength(5);
$result = $validator->validate("php");

var_dump($result);

$validator = $factoryValidator->number();
$result = $validator->validate(5);

var_dump($result);

$validator = $factoryValidator->phone();
$result = $validator->validate(+380999999999);

var_dump($result);

$validator = $factoryValidator->inList(['MinLengthValidator', 'RegExpValidator', 'EmailValidator', 'MaxLengthValidator', 'IsNumberValidator', 'PhoneValidator', 'InListValidator']);
$result = $validator->validate("MinLengthValidator");

var_dump($result);

