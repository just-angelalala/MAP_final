<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    protected $db;
    public function __construct() {
        helper(['url', 'form','session']);
        $this->db = \Config\Database::connect();
    }
    public function dashboard()
    {
        $useSessionData = session()->get();

        if (empty($useSessionData['admin_id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        return view('admin/dashboard');
    }
}
