<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductCategoryModel;
use App\Models\ProductsModel;
use App\Models\CategoryModel;

class ProductsController extends ResourceController
{
    private $products;
    private $category;
    private $productCategories;

    public function __construct() {
        $this->products = new ProductsModel();
        $this->category = new CategoryModel();
        $this->productCategories = new ProductCategoryModel();
    }

    public function index()
    {
        //
    }

    public function getAllCategories(){
        try {
            $categories = $this->category->select('CategoryName')->findAll();

            $categoryNames = array_column($categories, 'CategoryName');

            return $this->respond($categoryNames);
        } catch (\Throwable $th) {
            return $this->respond(['message' => "Error: ".$th->getMessage()]);
        }
    }

    public function addProduct()
    {
        try {
            $data = [
                'ProductName' => $this->request->getVar('ProductName'),
                'ProductDescription' => $this->request->getVar('ProductDescription'),
                'Price' => $this->request->getVar('Price'),
                'Quantity' => $this->request->getVar('Quantity'),
            ];

            if($data['Quantity'] > 0){
                $data['Status'] = 'In Stock';
            }else{
                $data['Status'] = 'Out of Stock';
            }

            $this->products->save($data);

            return $this->respond(['message' => 'Product saved successfully']);
        } catch (\Throwable $th) {
            return $this->respond(['message' => $th->getMessage()]);
        }
    }

    public function displayProducts(){
        try {
            $products = $this->products->findAll();

            return $this->respond($products);
        } catch (\Throwable $th) {
            return $this->respond(['message' => "Error: ".$th->getMessage()]);
        }
    }
}


