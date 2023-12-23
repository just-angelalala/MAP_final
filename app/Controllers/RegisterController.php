<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class RegisterController extends ResourceController
{
    use ResponseTrait;
   
    public function register()
    {
        // Validation Rules for User Registration
        $rules = [
            'Name' => ['rules' => 'required|min_length[2]|max_length[255]'],
            'Position' => ['rules' => 'required|min_length[2]|max_length[255]'],
            'ContactNumber' => ['rules' => 'required|min_length[11]|max_length[11]'],
            'UserEmail' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[tbluser.UserEmail]'],
            'UserPassword' => ['rules' => 'required|min_length[4]|max_length[255]'],
            'Address' => ['rules' => 'required|min_length[2]|max_length[255]'],
        ];
            
        if ($this->validate($rules)) {
            $model = new UserModel();
            
            $data = [
                'Name' => $this->request->getVar('Name'),
                'Position' => $this->request->getVar('Position'),
                'ContactNumber' => $this->request->getVar('ContactNumber'),
                'UserEmail' => $this->request->getVar('UserEmail'),
                'UserPassword' => password_hash($this->request->getVar('UserPassword'), PASSWORD_DEFAULT),
                'Address' => $this->request->getVar('Address'),
            ];
            
            $model->save($data);
            
            return $this->respond(['message' => 'Registered Successfully'], 200);
        } else {
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response, 409);
        }
    }
}
