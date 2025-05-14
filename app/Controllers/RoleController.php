<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\PermissionModel;
use CodeIgniter\Controller;

class RoleController extends BaseController
{
    public function index()
    {
        $model = new RoleModel();
        $data['roles'] = $model->findAll();
        return view('roles/index', $data);
    }

    public function create()
    {
        return view('roles/create');
    }

    public function store()
    {
        $model = new RoleModel();
        $model->save([
            'role_name' => $this->request->getPost('role_name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/roles');
    }

    public function edit($id)
    {
        $roleModel = new RoleModel();
        $permModel = new PermissionModel();

        $data['role'] = $roleModel->find($id);
        $data['permissions'] = $permModel->where('role_id', $id)->findAll();

        return view('roles/edit', $data);
    }

    public function update($id)
    {
        $roleModel = new RoleModel();
        $permModel = new PermissionModel();

        $roleModel->update($id, [
            'role_name' => $this->request->getPost('role_name'),
            'description' => $this->request->getPost('description')
        ]);

        $permissions = $this->request->getPost('permissions');

        foreach ($permissions as $module => $perm) {
            $permModel->replace([
                'role_id' => $id,
                'module_name' => $module,
                'can_view' => isset($perm['can_view']) ? 1 : 0,
                'can_add' => isset($perm['can_add']) ? 1 : 0,
                'can_edit' => isset($perm['can_edit']) ? 1 : 0,
                'can_delete' => isset($perm['can_delete']) ? 1 : 0,
            ]);
        }

        return redirect()->to('/roles');
    }

    public function delete($id)
    {
        $model = new RoleModel();
        $model->delete($id);
        return redirect()->to('/roles');
    }
}


