<?php

namespace App\Validation\Validators;

/**
 * Description of NumbersValidator
 *
 * @author piotrek
 */
class AccountValidator extends AbstractValidator
{

    public function validate($fieldValue)
    {
        return preg_match(self::ACCOUNT_PATTERN, $fieldValue);
    }
}
