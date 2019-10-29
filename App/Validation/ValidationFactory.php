<?php

namespace App\Validation;

use App\Validation\Validators\AlphaValidator;
use App\Validation\Validators\CurrencyValidator;
use App\Validation\Validators\AccountValidator;
use App\Validation\Validators\RequiredValidator;
use App\Validation\Validators\DateValidator;

/**
 * Description of ValidationFactory
 * return choosen validator class according to validation rules
 * @author piotrek
 */
class ValidationFactory
{

    public function getValidatorType(string $validatorType)
    {
        switch ($validatorType) {
            case 'alpha':
                $validator = new AlphaValidator();
                break;
            case 'currency':
                $validator = new CurrencyValidator();
                break;
            case 'numbers':
                $validator = new AccountValidator();
                break;
            case 'required':
                $validator = new RequiredValidator();
                break;
            case 'date':
                $validator = new DateValidator();
                break;
        }
        return $validator;
    }
}
