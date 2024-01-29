<?php

session_start();
ob_start();

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}
if (!isset($_SESSION["checkout"])) {
    $_SESSION["checkout"] = [];
}

require_once(__DIR__ . '/public/router.php');
require_once(__DIR__ . '/app/controller/index.php');

require_once realpath("vendor/autoload.php");

use App\controller\Controller as Controller;

$router = new Router();
$router
    // Home
    ->get('/', [Controller::class, 'index'])
    ->get('/admin', [Controller::class, 'admin'])
    ->get('/mailer', [Controller::class, 'mailer'])
    ->get('/index', [Controller::class, 'index'])
    ->get('/shop', [Controller::class, 'shop'])
    ->get('/about', [Controller::class, 'about'])
    ->get('/contact', [Controller::class, 'contact'])
    ->get('/news', [Controller::class, 'news'])
    ->get('/checkout', [Controller::class, 'checkout'])
    ->get('/detail', [Controller::class, 'detail'])
    ->get('/register', [Controller::class, 'register'])
    ->get('/login', [Controller::class, 'login'])
    ->get('/edit_user', [Controller::class, 'edit_user'])
    ->get('/change_password', [Controller::class, 'change_password'])
    ->get('/logout', [Controller::class, 'logout'])
    ->get('/forgot_pass', [Controller::class, 'forgot_pass'])
    ->get('/cart', [Controller::class, 'cart'])
    ->get('/order_confirm', [Controller::class, 'order_confirm'])
    ->post('/xl_checkout', [Controller::class, 'xl_checkout'])
    ->post('/xl_register', [Controller::class, 'xl_register'])
    ->post('/xl_login', [Controller::class, 'xl_login'])
    ->post('/xl_forgot_pass', [Controller::class, 'xl_forgot_pass'])
    ->post('/xl_quantity_cart', [Controller::class, 'xl_quantity_cart'])
    ->post('/xl_order', [Controller::class, 'xl_order'])
    ->post('/xl_edit_user', [Controller::class, 'xl_edit_user'])
    ->post('/xl_change_password', [Controller::class, 'xl_change_password'])
    ->post('/xl_upload_avata', [Controller::class, 'xl_upload_avata'])


    // Admin
    ->get('/admin', [Controller::class, 'admin'])
    ->get('/list_product_admin', [Controller::class, 'list_product_admin'])
    ->get('/add_product_admin', [Controller::class, 'add_product_admin'])
    ->post('/xl_add_product_admin', [Controller::class, 'xl_add_product_admin'])
    ->get('/update_product_admin', [Controller::class, 'update_product_admin'])
    ->get('/list_order_admin', [Controller::class, 'list_order_admin'])
    ->get('/list_order_detail_admin', [Controller::class, 'list_order_detail_admin'])
    ->post('/xl_update_product_admin', [Controller::class, 'xl_update_product_admin'])
    ->post('/xl_chart_by_month', [Controller::class, 'xl_chart_by_month'])
    ->get('/del_product', [Controller::class, 'del_product'])
    ->post('/xl_update_order', [Controller::class, 'xl_update_order']);

echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);

ob_end_flush();
