<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTFul\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use \Firebase\JWT\JWT;

class AuthController extends ResourceController
{
    use ResponseTrait;

    public function login()
    {
        $userModel = new UserModel();
   
        $UserEmail = $this->request->getVar('UserEmail');
        $UserPassword = $this->request->getVar('UserPassword');
           
        $user = $userModel->where('UserEmail', $UserEmail)->first();
   
        if(is_null($user)) {
            return $this->respond(['error' => 'Invalid username or UserPassword.'], 401);
        }
   
        $pwd_verify = Password_verify($UserPassword, $user['UserPassword']);
   
        if(!$pwd_verify) {
            return $this->respond(['error' => 'Invalid username or UserPassword.'], 401);
        }
  
        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;
  
        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "UserEmail" => $user['UserEmail'],
        );
          
        $token = JWT::encode($payload, $key, 'HS256');
  
        $response = [
            'message' => 'Login Succesful',
            'token' => $token
        ];
          
        return $this->respond($response, 200);
    }
}
