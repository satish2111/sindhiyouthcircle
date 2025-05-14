<?php 
function has_permission($role_id, $module, $action) {
    $db = \Config\Database::connect();
    $perm = $db->table('sys_permissions')
        ->where('role_id', $role_id)
        ->where('module_name', $module)
        ->get()->getRow();

    return $perm && $perm->{'can_' . $action} == 1;
}

?>