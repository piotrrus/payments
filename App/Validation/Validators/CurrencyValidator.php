<?php

namespace App\Validation\Validators;

/**
 * CurrencyValidator for text fields
 * @author piotrek
 */
class CurrencyValidator extends AbstractValidator
{

    public function validate($fieldValue)
    {
        $fieldValue = str_replace(',', '.', $fieldValue);
        return preg_match(self::CURRENCY_PATTERN, $fieldValue);
    }
}
