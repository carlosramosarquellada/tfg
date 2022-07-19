<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Usuarios::login');
$routes->get('/home', 'Home::home');
$routes->get('/phpinfo', 'Home::phpinfo');
$routes->get('pages', 'Pages::index');
$routes->get('pages/showme', 'Pages::showme');

$routes->get('tienda', 'Productos::index');
$routes->get('carrito', 'Productos::carrito');
$routes->post('carrito', 'Productos::carrito');
$routes->get('registro', 'Usuarios::registro');
$routes->post('registro', 'Usuarios::registro');
$routes->post('login', 'Usuarios::login');
$routes->get('login', 'Usuarios::login');
$routes->get('logout', 'Usuarios::logout');
$routes->post('productos/add_carrito_ajax', 'Productos::add_carrito_ajax');
$routes->get('productos/add_carrito_ajax', 'Productos::add_carrito_ajax');
$routes->post('productos/update_carrito_ajax', 'Productos::update_carrito_ajax');
$routes->get('productos/update_carrito_ajax', 'Productos::update_carrito_ajax');
$routes->get('checkout', 'Productos::checkout');
$routes->post('checkout', 'Productos::checkout');
$routes->get('pedido_realizado', 'Productos::pedido_realizado');
$routes->post('pedido_realizado', 'Productos::pedido_realizado');
$routes->get('productos', 'Productos::productos_list');
$routes->post('productos', 'Productos::productos_list');
$routes->get('clientes', 'Usuarios::clientes_list');
$routes->post('clientes', 'Usuarios::clientes_list');
$routes->get('productos/add_producto', 'Productos::add_producto');
$routes->post('productos/add_producto', 'Productos::add_producto');
$routes->get('productos/edit/(:any)', 'Productos::edit_producto/$1');
$routes->post('productos/edit/(:any)', 'Productos::edit_producto/$1');
$routes->get('clientes/edit/(:any)', 'Usuarios::edit_cliente/$1');
$routes->post('clientes/edit/(:any)', 'Usuarios::edit_cliente/$1');
$routes->get('clientes/direcciones/(:any)', 'Usuarios::direcciones_list/$1');
$routes->post('clientes/direcciones/(:any)', 'Usuarios::direcciones_list/$1');
$routes->get('direcciones/edit/(:any)', 'Usuarios::edit_direccion/$1');
$routes->post('direcciones/edit/(:any)', 'Usuarios::edit_direccion/$1');
$routes->get('pedidos', 'Usuarios::pedidos_list');
$routes->post('pedidos', 'Usuarios::pedidos_list');
$routes->get('pedidos/ver_pedido/(:any)', 'Usuarios::ver_pedido/$1');
$routes->post('pedidos/ver_pedido/(:any)', 'Usuarios::ver_pedido/$1');
$routes->get('carrusel', 'Usuarios::carrusel');
$routes->post('carrusel', 'Usuarios::carrusel');
$routes->get('carrusel/add_diapositiva', 'Usuarios::add_diapositiva');
$routes->post('carrusel/add_diapositiva', 'Usuarios::add_diapositiva');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
