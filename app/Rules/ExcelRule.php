<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExcelRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!in_array($value->getClientOriginalExtension(), ['csv', 'xls', 'xlsx', 'ods'])) {
            $fail('The extension of file must be :attribute type.');
        }
    }
}
