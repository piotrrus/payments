<?php

namespace App\Validation\Validators;

/**
 * Description of AlphaValidator
 * 
 * @author piotrek
 */
class AlphaValidator extends AbstractValidator
{

    public function validate($fieldValue)
    {
        return preg_match(self::APLHA_PATTERN, $fieldValue);
    }
}
