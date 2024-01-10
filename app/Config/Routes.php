<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/level-page', 'Home::levelPage');
$routes->get('/quiz/level/(:num)', 'Quiz::quizViewer/$1');
$routes->post('/quiz/submit-answer', 'Quiz::submitAnswer');


$routes->get('/tes','Quiz::readData');
