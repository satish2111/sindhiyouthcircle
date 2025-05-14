<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'sys_users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username', 'password', 'email', 'status','fullname'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
