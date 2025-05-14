<?php

namespace App\Controllers;

use App\Models\PermissionModel;
use App\Models\RoleModel;
use CodeIgniter\Controller;

class PermissionController extends BaseController
{
    public function index()
    {
        $permissionModel = new PermissionModel();
        $data['permissions'] = $permissionModel->findAll();

        return view('permissions/index', $data);
    }

    public function create()
    {
        $roleModel = new RoleModel();
        $data['roles'] = $roleModel->findAll();

        return view('permissions/create', $data);
    }

    public function store()
    {
        $permissionModel = new PermissionModel();
        $permissionModel->save($this->request->getPost());

        return redirect()->to('/permissions')->with('success', 'Permission added successfully.');
    }

    public function edit($id)
    {
        $permissionModel = new PermissionModel();
        $roleModel = new RoleModel();

        $data['permission'] = $permissionModel->find($id);
        $data['roles'] = $roleModel->findAll();

        return view('permissions/edit', $data);
    }

    public function update($id)
    {
        $permissionModel = new PermissionModel();
        $permissionModel->update($id, $this->request->getPost());

        return redirect()->to('/permissions')->with('success', 'Permission updated successfully.');
    }

    public function delete($id)
    {
        $permissionModel = new PermissionModel();
        $permissionModel->delete($id);

        return redirect()->to('/permissions')->with('success', 'Permission deleted.');
    }
}
