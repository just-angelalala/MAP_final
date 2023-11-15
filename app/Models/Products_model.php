<?php

namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tblproducts';
    protected $allowedFields = [
        'ProductName',
        'ProductDescription',
        'Price', 
        'Quantity', 
        'Status', 
        'Category' 
    ];
    protected $primaryKey = 'ProductID';
    

}

?>