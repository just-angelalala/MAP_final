<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tbluser';
    protected $allowedFields = [
        'UserID',
        'Name',
        'Position',
        'ContactNumber',
        'UserEmail',
        'UserPassword',
        'Token',
        'Address',
    ];
    protected $primaryKey = 'UserID';
    


    protected function passwordHash(array $data)
    {
        if (isset($data['data']['UserPassword']))
        $data['data']['UserPassword'] = UserPassword_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}

?>