<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SettingController extends BaseController
{
    public function index()
    {
        if (!session()->get('role') || session()->get('role') != 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Access denied!');
        }

        return view('settings/index');
    }
}
