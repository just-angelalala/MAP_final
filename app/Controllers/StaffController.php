<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StaffController extends BaseController
{
    protected $db;
    public function __construct() {
        helper(['url', 'form','session']);
        $this->db = \Config\Database::connect();
    }
    public function home()
    {
        $useSessionData = session()->get();

        if (empty($useSessionData['staff_id'])) {
            return redirect()->to('/'); // Redirect to the landing page
        }
        return view('staff/home');
    }
}
