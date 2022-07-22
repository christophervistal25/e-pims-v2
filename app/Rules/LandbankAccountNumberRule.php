<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LandbankAccountNumberRule implements Rule
{
    public const CODE = '432765432';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $checkSum = ($value + 0);
        if ($checkSum === 0 || strlen($value) <= 9) {
            $this->message = 'Invalid account number';

            return false;
        }
        $isDigit = false;
        $firstNumber = 0;
        $secondNumber = 0;
        $startIndex = 0;
        $lastDigit = 0;
        $MINUED = 11;
        $accountNumber = $value;

        do {
            $first = $accountNumber[$startIndex];
            $second = self::CODE[$startIndex] ?? 0;

            if ($second == 0) {
                $lastDigit = (int) $first;
                break;
            }

            $firstNumber += (int) $first * (int) $second;
            $startIndex++;
        } while ($startIndex <= strlen(self::CODE));

        $secondNumber = $firstNumber % $MINUED;
        if (($secondNumber == 0 or $secondNumber == 1.0) and $lastDigit == 0) {
            $isDigit = true;
        } else {
            if ($lastDigit == ($MINUED - $secondNumber)) {
                $isDigit = true;
            }
        }

        if (! $isDigit) {
            $this->message = 'Invalid account number';
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
