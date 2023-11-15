<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User_model;

class AuthController extends BaseController
{
    public function signin()
    {
        helper(['form']);
        $data = [];
        
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
    
        if($this->request->getMethod() == 'post')
        {
            $validation = [
                'UserEmail' => 'required|valid_email|is_not_unique[tbluser.UserEmail]',
                'UserPassword' => 'required',
            ];
            $errors = [
                'UserEmail' => [
                    'required' => 'The email is required.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid',
                    'is_not_unique' => 'Email does not exist',
                ],
                'UserPassword' => [
                    'required' => 'The password is required',
                ]
            ];
            if(!$this->validate($validation, $errors))
            {
                $data['validation'] = $this->validator;
            } else {
                $session = session();
                $model = new User_model();
                $user = $model->where('UserEmail', $this->request->getVar('UserEmail'))->first();
                if($this->verifyMypassword($this->request->getVar('UserPassword'), $user['UserPassword']))
                {
                    if($user['Status'] == 'verified') {
                        if ($user['Position'] == 'Admin') {
                            $this->setAdminSession($user); // Set Admin session
                            return redirect()->to('dashboard');
                        } elseif ($user['Position'] == 'Staff') {
                            $this->setStaffSession($user); // Set Staff session
                            return redirect()->to('home');
                        }
                    } else {
                        $session->setFlashdata('msg', 'Account not yet verified. Kindly check your email for link verification.');
                        return redirect()->back();
                    }
                } else {
                    $session->setFlashdata('msg', 'Invalid Password');
                    $data['Flash_message'] = true;
                }
            }
        }
        return view('signin', $data);
    }
    

    private function setStaffSession($staff_data)
    {
        $data = [
            'staff_id' => $staff_data['UserID'],
            'Name' => $staff_data['Name'],
            'ContactNumber' => $staff_data['ContactNumber'],
            'UserEmail' => $staff_data['UserEmail'],
            'Address' => $staff_data['Address'],
            'isLoggedIn' => true,
            'isStaff' => true,
        ];
        session()->set($data);
    }

    private function setAdminSession($admin)
    {
        $data = [
            'admin_id' => $admin['UserID'],
            'Name' => $admin['Name'],
            'ContactNumber' => $admin['ContactNumber'],
            'UserEmail' => $admin['UserEmail'],
            'Address' => $admin['Address'],
            'isLoggedIn' => true,
            'isAdmin' => true,
        ];
        session()->set($data);
    }

    private function verifyMyPassword($enterpassword, $databasePassword)
    {   
        return password_verify($enterpassword, $databasePassword);
    }

    public function register()
    {
        $data = [];
        helper(['form']);
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
        if ($this->request->getMethod() == 'post') {
            $validation = [
                'Name' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'The firstname is required',
                    ],
                ],
                'ContactNumber' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'The contact is required',
                    ],
                ],
                
                'UserPassword' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'The address is required',
                    ],
                ],
                'UserEmail' => [
                    'rules'  => 'required|min_length[4]|max_length[50]|valid_email|is_unique[tbluser.UserEmail]',
                    'errors' => [
                        'required' => 'The email address is required',
                        'valid_email' => 'Please check the Email field. It does not appear to be valid',
                        'is_unique' => 'Email is already taken',
                    ],
                ],
                'UserPassword' => [
                    'rules'  => 'required|min_length[8]|max_length[100]',
                    'errors' => [
                        'required' => 'Password is required.',
                        'min_length' => 'Password must have atleast 8 characters in length.',
                        'max_length' => 'Password must not have characters more than 100 characters in length.',
                    ],
                ],
                'confirm_password' => [
                    'rules'  => 'matches[UserPassword]',
                    'errors' => [
                        'required' => 'Confirm password is required.',
                        'matches' => 'Confirm Password must matches to password.',
                    ],
                ],
            ];
            if (!$this->validate($validation)) {
                // Validation failed
                $data['validation'] = $this->validator;
            } else {
                // Validation passed
                $userModel = new User_model();
                $token = $this->token(100);

                // Get data from the form
                $name = $this->request->getVar('Name');
                $position = $this->request->getVar('Position');
                $userEmail = $this->request->getVar('UserEmail');
                $contactNumber = $this->request->getVar('ContactNumber');
                $userPassword = $this->request->getVar('UserPassword');
                $address = $this->request->getVar('Address');

                $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);

                $userData = [
                    'Name' => $name,
                    'Position' => $position,
                    'UserEmail' => $userEmail,
                    'ContactNumber' => $contactNumber,
                    'UserPassword' => $hashedPassword,
                    'Address' => $address,
                    'Token' => $token,
                    'Status' => 'not_verified',
                ];

                if($userModel->save($userData))
                {
                    $email = \Config\Services::email();
                    $email->setTo($userEmail);
                    $email->setFrom('decastrojustin24@gmail.com');
                    $email->setSubject('Account Activation');
            
                    $email->setMailType('html');
                    
                    $message = view('emails/account_activation', [
                        'name' => $name,
                        'position' => $position,
                        'userEmail' => $userEmail,
                        'contactNumber' => $contactNumber,
                        'address' => $address,
                        'token' => $token
                    ]);
                    $email->setMessage($message); 
                    if($email->send()){
                    return redirect()->to('Login')
                    ->with('status_icon', 'success')    
                    ->with('status', 'Registration successful! Please check your email inbox for account activation.');
                }
            }
            }
        }
        return view('register', $data);
    }


    public function sendMail($to, $subject, $message)
    {
        $to = $to;
        $subject = $subject;
        $message = $message;
        $headers = 'MIME-Version:1.0' . "\r\n";
        $headers = 'Content-type: text/html; charset=iso8859-1' . "\r\n";
        $email = \Config\Services::email();
        $email-> setMailType("html");   
        $email->setTo($to);
        $email->setFrom('angelasamaritaramirez@gmail.com', $subject);
        $email->setMessage($message);
        if($email->send()){
            echo 'Email Sent Successfully';
        } else{
            $data = $email->printDebugger(['headers']);
            print($data);
        }
    }

    public function token($length)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result),0, $length);
    }

    public function verify_account($id = null)
    {
        $User_model = new User_model();
        $account = $User_model->where('Token', $id)->first();
        if($User_model){
            $data = [
                'Token' => $this->token(100),
                'Status' => 'verified'
            ];
            $User_model->set($data)->where('Token', $id)->update();
            $session = session();
            return redirect()->to('Login')
            ->with('status_icon', 'success')    
            ->with('status', 'Account has been verified');
        }else{
            $session = session();
            $session->setFlashdata('msg', 'Invalid Link');
        }
        
        return redirect('Login');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    
}