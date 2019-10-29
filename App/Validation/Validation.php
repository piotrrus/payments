<?php

namespace App\Validation;

use App\Validation\Rules\PaymentsRules;
use App\Validation\ValidationFactory;

/**
 * Description of Validation
 * validate field values according to rules
 * @author piotrek
 */
class Validation
{
    private $rules;

    public function __construct()
    {
        $this->rules = new PaymentsRules();
    }

    public function validate($post)
    {

        $isValid = true;
        unset($post['checked']);

        foreach ($post as $key => $value) {
            foreach ($value as $val) {
                $isValid = $isValid && $this->validateFields($key, $val);
            }
        }
        return $isValid;
    }

    private function validateFields(string $fieldName, $fieldValue)
    {
        $rulesArr = $this->rules->rules();

        if (array_key_exists($fieldName, $rulesArr)) {
            return $this->checkFieldRules($fieldName, $fieldValue);
        } else {
            return true;
        }
    }

    /**
     *
     * @param string $fieldName
     * @param type $fieldValue
     * @return boolean
     */
    private function checkFieldRules(string $fieldName, $fieldValue)
    {
        $rules = $this->rules->rules();

        $fieldRules = $this->getRules($rules[$fieldName]);

        foreach ($fieldRules as $rule) {
            if (!$this->checkRules($rule, $fieldValue)) {
                return false;
            }
        }
        return true;
    }

    private function checkRules(string $rule, $fieldValue)
    {
        $validator  = new ValidationFactory();
        $validation = $validator->getValidatorType($rule);
        return $validation->validate($fieldValue);
    }

    private function getRules($fieldName)
    {
        return explode('|', $fieldName);
    }
}
