<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tbltransaction';
    protected $allowedFields = [
        'CustomerName', 
        'CustomerAddress', 
        'Sales_Date', 
        'Payment_Amount', 
        'Change_Amount', 
        'Total_Amount', 
        'UserID'
    ];
    protected $primaryKey = 'Transaction_No';
    

}

?>