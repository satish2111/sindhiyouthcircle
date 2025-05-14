<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the user is logged in
        if (!session()->has('isLoggedIn')) {
            return view('dashboard', [
                'title' => 'Dashboard',
            ]);
        }

        // Retrieve the role from the session
        $role = session()->get('role');

        // Pass the role to the view if needed
        return view('dashboard', ['role' => $role]);
    }
}
