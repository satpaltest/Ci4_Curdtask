<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
// display all user records
$routes->get('/allrecord', 'RecordController::UserData');
//display insert user form
$routes->get('/addUsers', 'RecordController::AddUser');
// insert new user
$routes->post('/add-users','RecordController::insertUser');
//edit user 
$routes->get('/allrecord/edit-user/(:num)','RecordController::editUser/$1');
// edit-users
$routes->post('/edit-users/(:num)','RecordController::updateUser/$1');
//delete user
$routes->get('/allrecord/delete/(:num)','RecordController::delete/$1');

