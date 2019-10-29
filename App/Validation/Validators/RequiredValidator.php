<?php

namespace App\Validation\Validators;

/**
 * Description of RequiredValidator
 *
 * @author piotrek
 */
class RequiredValidator extends AbstractValidator
{

    public function validate($fieldValue)
    {
        if ($fieldValue && isset($fieldValue)) {
            return true;
        } else {
            return false;
        }
    }
}
