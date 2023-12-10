<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', static function($routes) {
    // Define a route for the Register controller
    $routes->post('register', 'RegisterController::register');

    $routes->post('login', 'AuthController::login');


    $routes->post('getProductsAndCategories', 'ProductCategoryController::getProductsAndCategories');


    $routes->post('addTransaction', 'AddTransactionController::addTransaction');

    $routes->get('getAllCategories', 'ProductsController::getAllCategories');

    $routes->post('addProduct', 'ProductsController::addProduct');

    $routes->get('displayProducts', 'ProductsController::displayProducts');
});
