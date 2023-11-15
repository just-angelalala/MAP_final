<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        
        if ($session->get('isLoggedIn')) {
            $isAdmin = $session->get('isAdmin');
            $isStaff = $session->get('isStaff');
    
            if ($isAdmin) {
                return redirect()->to('dashboard');
            } elseif ($isStaff) {
                return redirect()->to('home');
            }
            
        }
        return view('landingpage');
    }
}
