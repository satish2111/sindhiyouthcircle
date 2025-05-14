<?php

namespace App\Models;

use CodeIgniter\Model;

class FinancialYearModel extends Model
{
    protected $table = 'financial_years';
    protected $primaryKey = 'id';
    protected $allowedFields = ['start_date', 'end_date', 'status'];
    protected $useTimestamps = true;
}
