<?php

namespace App\Validation\Rules;

/**
 * Description of PaymentsRules
 * This is validation for payments input fields
 *
 */
class PaymentsRules
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account' => 'required|numbers',
            'name' => 'required|alpha',
            'surname' => 'required|alpha',
            'amount' => 'required|currency',
            'payment_date' => 'required|date',
            'payment_purpose' => 'required'
        ];
    }
}
