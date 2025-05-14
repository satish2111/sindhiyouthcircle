<?php

namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table = 'sys_permissions';
    protected $primaryKey = 'id';

    protected $allowedFields = ['role_id', 'module_name', 'can_view', 'can_add', 'can_edit', 'can_delete'];

    protected $useTimestamps = false;
}
