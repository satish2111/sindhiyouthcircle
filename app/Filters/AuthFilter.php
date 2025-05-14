<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Services;

class AuthFilter implements FilterInterface
{
    public function before($request, $arguments = null)
    {
        // Check if the user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Check if the user has the required role
        if (isset($arguments[0]) && session()->get('role') !== $arguments[0]) {
            return redirect()->to('/dashboard'); // Redirect to dashboard if not authorized
        }
    }

    public function after($request, $response, $arguments = null)
    {
        // No need to do anything here for now
    }
    public $filters = [
        'auth' => ['before' => ['dashboard', 'admin/*']], // Protect dashboard and admin routes
    ];
    
}
