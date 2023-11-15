<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tblproductbought';
    protected $allowedFields = [
        'Product_Bought',
        'Transaction_No',
        'Quantity', 
        'PbPrice', 
        'ProductID'
    ];
    protected $primaryKey = 'P_boughtID';
    
}

?>