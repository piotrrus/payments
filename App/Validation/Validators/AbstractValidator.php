<?php

namespace App\Validation\Validators;

/**
 * Description of Validators
 *
 * @author piotrek
 */
abstract class AbstractValidator
{
    const APLHA_PATTERN    = '/^[a-zA-Z\s]+$/';
    const ACCOUNT_PATTERN  = '/^[0-9]{26}$/';
    const CURRENCY_PATTERN = '/^[0-9]+(\.[0-9]{1,2})?$/';

    abstract function validate($fieldValue);
}
