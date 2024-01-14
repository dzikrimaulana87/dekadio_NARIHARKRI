<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/modul-page', 'Home::modulPage');
$routes->get('/level-page', 'Home::levelPage');
$routes->get('/vid-page', 'Home::vidPage');
$routes->get('/quiz/level/(:num)', 'Quiz::quizViewer/$1');
$routes->post('/quiz/submit-answer', 'Quiz::submitAnswer');


$routes->get('/tes', 'Quiz::readData');
$routes->get('/assignment', 'Quiz::assignmentPage');

$routes->get('/login', 'Authentication::loginPage');
$routes->post('/login-action', 'Authentication::login');


$routes->get('/register', 'Authentication::registerPage');
$routes->post('/register-action', 'Authentication::register');

$routes->get('/reset-password', 'Authentication::resetPassword');
$routes->post('/reset-password-action', 'Authentication::sendResetLink');

