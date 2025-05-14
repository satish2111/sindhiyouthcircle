<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table      = 'sys_user_roles';
    protected $primaryKey = 'user_id';

    protected $allowedFields = [
        'user_id', 'role_id'
    ];

     // optional: disable validation if you're not using it
     protected $validationRules = [];
     protected $skipValidation = true;
}
