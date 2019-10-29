<?php

namespace App\Validation\Validators;

/**
 * Description of DateValidator
 *
 * @author piotrek
 */
class DateValidator extends AbstractValidator
{

    public function validate($fieldValue)
    {
        $format = 'Y-m-d';
        return $fieldValue === date($format, strtotime($fieldValue));
    }
}
