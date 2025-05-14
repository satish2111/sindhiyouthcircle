<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\UserRoleModel;

class AuthController extends Controller
{
    public function register_view()
    {
        $userModel = new UserModel();
        $users = $userModel
            ->select('sys_users.*, sys_roles.role_name as role') // Select user and role name
            ->join('sys_user_roles', 'sys_user_roles.user_id = sys_users.id', 'left') // Join sys_user_roles
            ->join('sys_roles', 'sys_roles.id = sys_user_roles.role_id', 'left') // Join sys_roles to get the role name
            ->findAll(); // Fetch all users with their roles

        return view('auth/index', ['users' => $users]); // Pass the data to the view

    }

    public function create()
    {
        $roleModel = new RoleModel();
        $data['roles'] = $roleModel->findAll();

        return view('auth/create', $data);
    }


    public function edit($id)
    {
        helper(['form', 'url']);

        $userModel = new UserModel();
        $roleModel = new RoleModel();
        $userRoleModel = new UserRoleModel();

        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/register_view')->with('error', 'User not found.');
        }

        // Get the user's current role
        $userRole = $userRoleModel->where('user_id', $id)->first();
        $role = $roleModel->find($userRole['role_id'] ?? 0);
        $user['role'] = $role['role_name'] ?? '';

        $data = [
            'user' => $user,
            'roles' => $roleModel->findAll()
        ];

        return view('auth/edit', $data);
    }


    public function store()
    {
        helper(['form', 'url']);

        if ($this->request->getMethod() === 'post') {
            // Get form inputs
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $fullname = $this->request->getPost('fullname');
            $emailid = $this->request->getPost('emailid');
            $role = $this->request->getPost('role');  // This will be the role name like 'admin' or 'pharmacist'

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare data to insert into sys_users
            $userModel = new UserModel();
            $userData = [
                'username' => $username,
                'password' => $hashedPassword,
                'fullname' => $fullname,
                'email' => $emailid,
            ];

            // Insert the user into sys_users table
            $userId = $userModel->insert($userData);

            // If user is successfully inserted, insert the role into sys_user_roles
            if ($userId) {
                // Fetch the role_id based on the role name
                $roleModel = new RoleModel();
                $roleData = $roleModel->where('role_name', $role)->first();

                if ($roleData && isset($roleData['id'])) {
                    $roleId = $roleData['id'];
                    $userRoleData = [
                        'user_id' => $userId,
                        'role_id' => $roleId,
                    ];
                    $userRoleModel = new userRoleModel;
                    if ($userRoleModel->insert($userRoleData)) {

                        return redirect()->to('/register')->with('success', 'Registered successfully!');
                    } else {
                        return redirect()->to('/register')->with('error', 'Failed to assign role.');
                    }
                } else {
                    log_message('error', 'Role not found: ' . $role);
                    return redirect()->to('/register')->with('error', 'Role not found.');
                }
            } else {
                return redirect()->to('/register')->with('error', 'Registration failed.');
            }
        }

        // Load the registration view
        return view('auth/register');
    }

    public function update($id)
    {
        helper(['form', 'url']);

        if ($this->request->getMethod() === 'post') {
            // Validation
            $validationRule = [
                'username' => 'required|min_length[3]|max_length[50]',
                'password' => 'permit_empty|min_length[6]|max_length[255]',
                'fullname' => 'required',
                'emailid' => 'required|valid_email',
                'role' => 'required',
            ];

            if (!$this->validate($validationRule)) {
                return redirect()
                    ->to('/register/edit/' . $id)
                    ->withInput()
                    ->with('error', \Config\Services::validation()->listErrors());
            }


            $userModel = new UserModel();
            $user = $userModel->find($id);

            if (!$user) {
                return redirect()->to('/register/index')->with('error', 'User not found.');
            }

            // Prepare updated data
            $userData = [
                'username' => $this->request->getPost('username'),
                'fullname' => $this->request->getPost('fullname'),
                'email' => $this->request->getPost('emailid'),
            ];

            // Update password only if it's not empty
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $userModel->update($id, $userData);

            // Update role
            $roleName = $this->request->getPost('role');
            $roleModel = new RoleModel();
            $roleData = $roleModel->where('role_name', $roleName)->first();

            if ($roleData) {
                $userRoleModel = new UserRoleModel();
                $userRoleModel->where('user_id', $id)->delete(); // Remove old role
                $userRoleModel->insert([
                    'user_id' => $id,
                    'role_id' => $roleData['id'],
                ]);

                return redirect()->to('/register')->with('success', 'User updated successfully.');
            } else {
                return redirect()->to('/register/edit/' . $id)->with('error', 'Role not found.');
            }
        }

        // Load user and roles
        $userModel = new UserModel();
        $roleModel = new RoleModel();
        $data['user'] = $userModel->find($id);
        $data['roles'] = $roleModel->findAll();

        return view('auth/edit', $data);
    }

    public function login()
    {

        helper(['form', 'url']);

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $model = new UserModel();

            // Join sys_user_roles and roles table to get the role
            $user = $model
                ->select('sys_users.*, sys_user_roles.role_id, sys_roles.role_name as role')  // Select role
                ->join('sys_user_roles', 'sys_user_roles.user_id = sys_users.id', 'left')
                ->join('sys_roles', 'sys_roles.id = sys_user_roles.role_id', 'left')
                ->where('sys_users.username', $username)
                ->first();

            if ($user && password_verify($password, $user['password'])) {
                // Set session data, including the 'role'
                session()->set([
                    'isLoggedIn' => true,
                    'username' => $user['fullname'],
                    'role' => $user['role'],  // Role is now correctly set
                ]);

                return redirect()->to('/dashboard');
            } else {
                // Incorrect credentials
                return redirect()->to('/login')->with('error', 'Invalid username or password.');
            }
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
