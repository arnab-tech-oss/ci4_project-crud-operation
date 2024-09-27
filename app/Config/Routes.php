<?php
namespace Config;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'TestController::showfrom');
$routes->post('/test/submitfrom', 'TestController::submitfrom');
$routes->get('/landing/page', 'TestController::landing_page');
$routes->get('/list', 'TestController::index');
$routes->get('users/edit/(:num)', 'TestController::edit/$1');
$routes->post('users/update', 'TestController::update');
$routes->get('users/delete/(:num)', 'TestController::delete/$1');