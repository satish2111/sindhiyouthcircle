<?php

namespace App\Validation;

class CustomRules
{
    public function check_date_range(string $str, string $fields, array $data): bool
    {
        return strtotime($data['end_date']) >= strtotime($data['start_date']);
    }
}
