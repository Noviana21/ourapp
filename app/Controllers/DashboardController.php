<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        // Proteksi agar hanya user login yang bisa masuk
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }

        return view('dashboard/index');
    }
}
