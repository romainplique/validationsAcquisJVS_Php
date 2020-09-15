<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/products', [ 'uses' => 'ProductsController@allProducts']);
$router->get('/api/products/{idProduct}', [ 'uses' => 'ProductsController@getProduct']);
$router->post('/api/products', [ 'uses' => 'ProductsController@createProduct']);
$router->patch('/api/products/{idProduct}', [ 'uses' => 'ProductsController@updateProduct']);
$router->delete('/api/products/{idProduct}', [ 'uses' => 'ProductsController@deleteProduct']);

$router->get('/api/basketproducts', [ 'uses' => 'BasketProductsController@allBasketProducts']);
$router->post('/api/basketproducts', [ 'uses' => 'BasketProductsController@addProductToBasket']);
$router->delete('/api/basketproducts/{idProduct}', [ 'uses' => 'BasketProductsController@removeProductFromBasket']);
