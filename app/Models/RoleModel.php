<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table      = 'sys_roles';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'role_name', 'description'
    ];
}
