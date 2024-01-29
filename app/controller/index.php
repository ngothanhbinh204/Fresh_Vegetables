<?php

namespace App\controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use App\model\productModel;
use App\model\userModel as userModel;
use App\model\form_validatorModel as form_validatorModel;
use App\model\cart as cartModel;
use App\model\searchModel as searchModel;
use App\model\orderModel as orderModel;
use App\model\orderDetailModel as orderDetailModel;



class Controller
{
    protected $errors = "";
    public $alert = "aaa";

    public function index()
    {
        include "app/view/header.php";
        include "app/view/home.php";
        include "app/view/footer.php";
    }
    public function mailer()
    {
        include "app/view/mailer.php";
    }


    public function search()
    {
        if (isset($_POST["action"])) {
            $search_input = $_POST["search_input"];
            //var_dump($search_input);
            $sp_search = new productModel();
            $result = $sp_search->load_Search($search_input);
            var_dump($result);
        }
    }

    public function detail()
    {
        $id = $_GET["id"];
        echo ($id);
        include "app/view/header.php";
        include "app/view/productDetail.php";
        include "app/view/footer.php";
    }

    public function shop()
    {
        include "app/view/header.php";
        include "app/view/shop.php";
        include "app/view/footer.php";
    }

    public function about()
    {
        include "app/view/header.php";
        include "app/view/about.php";
        include "app/view/footer.php";
    }

    public function contact()
    {
        include "app/view/header.php";
        include "app/view/contact.php";
        include "app/view/footer.php";
    }

    public function news()
    {
        include "app/view/header.php";
        include "app/view/news.php";
        include "app/view/footer.php";
    }

    public function checkout()
    {
        include "app/view/header.php";
        include "app/view/checkout.php";
        include "app/view/footer.php";
    }

    public function order_confirm()
    {
        $confirm_order = new orderModel;
        $result = $confirm_order->lastIdOrder();

        include "app/view/header.php";
        include "app/view/orderConfirm.php";
        include "app/view/footer.php";
    }
    public function register()
    {
        include "app/view/register.php";
    }

    public function login()
    {
        include "app/view/login.php";
    }

    public function forgot_pass()
    {
        include "app/view/forgotPass.php";
    }
    public function edit_user()
    {
        include "app/view/editUser.php";
    }
    public function change_password()
    {
        include "app/view/changePassword.php";
    }

    public function cart()
    {
        //echo $_GET['id'];
        // Đọc sản phẩm và đưa vào giỏ hàng
        if (isset($_GET['id'])) {
            $cart = new cartModel();
            $product = new productModel();
            $total_product = 0;
            // set id cho product
            $product->setID($_GET['id']);
            // get 1 product
            $one_product = $product->getmotsp($product->getId());
            //var_dump($one_product);
            $result = [$one_product[0]['Product_id'], $one_product[0]['Name'], $one_product[0]['Price'], 1, $one_product[0]['image']];
            //var_dump($result);
            // check product có trong cart không?
            $index = $cart->checkcart($result);
            if ($index == -1) {
                // push sản phẩm mới vào cart
                $_SESSION['cart'][] = $result;
            } else {
                // Nếu sp đã tồn tại thì + quantity
                $_SESSION['cart'][$index][3]++;
            }
        }

        // Del product in cart
        if (isset($_REQUEST['del_id'])) {
            $cart = new cartModel();
            $idPro_del = $_REQUEST['del_id'];
            $index = $cart->checkcart($idPro_del);
            // Xoa các phần tử trong giỏ hàng
            array_splice($_SESSION['cart'], $index, 1);
        }

        // Del all cart

        if (isset($_REQUEST['del_all'])) {
            $_SESSION['cart'] = [];
        }

        include "app/view/header.php";
        include "app/view/cart.php";
        include "app/view/footer.php";
    }

    public function xl_quantity_cart()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (isset($_POST['button_xl_quantity']) && $_POST['button_xl_quantity']) {
                $quatity = $_POST['quantity'];
                $id_cart = $_POST['id_cart'];
                $cart = new cartModel();
                $array_cart = [$id_cart, $quatity];
                $index = $cart->checkcart($array_cart);
                if ($index != -1) {
                    $_SESSION['cart'][$index][3] = $array_cart[1];
                    var_dump($array_cart);
                    header('location: /cart');
                }
            }
        }
    }

    public function xl_login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["button_login"])) {
                $user_login = new userModel;

                $user_login->setUserName($_POST['username']);
                $user_login->setPassWord(md5($_POST['password']));
                //check form validation

                $validator = new form_validatorModel($_POST);
                $validator->required('username');
                $validator->required('password');

                if ($validator->isValid()) {
                    $result = $user_login->login($user_login);
                    if ($result) {
                        $_SESSION['user'] = $result;
                        if (isset($_SESSION['user'])) {
                            echo "Có";
                        }
                        if ($result[0]["position"] == 1) {
                            header('location: /admin');
                        }

                        if ($result[0]["position"] == 0) {
                            header('location: /');
                        }
                    } else {
                        echo "Lhoong";
                    }
                } else {
                    foreach ($validator->errors as $field => $error) {
                        echo "<span style='color:red;font-weight:bold'>$error</span>";
                    }
                }
            }
        }
    }

    public function xl_register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["button_register"])) {
                $user = new userModel;

                $user->setUserName($_POST['username']);
                $user->setFullName($_POST['fullname']);
                $user->setPassWord(md5($_POST['password']));
                $user->setEmail($_POST['email']);
                $user->setPhone($_POST['phone']);


                // check form validation
                $validator = new form_validatorModel($_POST);
                $validator->required('username');
                $validator->required('password');
                $validator->required('email');
                // $validator->required('phone');
                $validator->email('email');
                $validator->minLength('password', '5');
                $validator->maxLength('password', '20');
                $validator->equalTo('password', 'confirm_password');

                if ($validator->isValid()) {
                    $user->addUser($user);
                    echo "Thành Công";
                    header('location: /');
                } else {
                    foreach ($validator->errors as $field => $error) {
                        echo "<span style='color:red;font-weight:bold'>$error</span>";
                    }
                }
            }
        }
    }

    public function xl_upload_avata()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["button_upload_avata"])) {
                $user = new userModel;
                $user->setIdUser($_POST["id_user"]);
                $user->setAvata($_FILES['avata']['name']);
                //var_dump($user);
                $user->uploadAvata();
                $user->updateAvata($user);
                //$alert = "Cập Nhật Avata User Thành Công";

                $result = $user->get_user_by_id($user);
                // Sau khi cập nhật user -> cập nhật lại SESSION['user']
                $_SESSION['user'] = $result;

                header('location: /edit_user');
            }
        }
    }

    public function xl_forgot_pass()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["button_forgot_pass"])) {
                $newpass = substr(rand(0, 999999), 0, 8);
                echo $newpass;
                $user = new userModel;
                $email =  $user->setEmail($_POST["email"]);
                $user->setPassWord(md5($newpass));
                $user->updatePass($user);
                //var_dump($user);

                // Gửi Mail khi đổi mk thành công
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                    $mail->isSMTP(); // gửi mail SMTP
                    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'ntbinh14122004@gmail.com'; // SMTP username
                    $mail->Password = 'itht atsz wtyj fhlf'; // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port = 587; // TCP port to connect to
                    //Recipients
                    $mail->setFrom('ntbinh14122004@gmail.com', 'Admin_Ngô_Thanh_Bình');
                    $mail->addAddress($email, 'Joe User'); // Add a recipient
                    // $mail->addAddress('ellen@example.com'); // Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    //  $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                    // Attachments
                    //  $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
                    //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
                    // Content
                    $mail->isHTML(true);   // Set email format to HTML
                    $mail->Subject = 'Chu de email';

                    $mail->Body = 'Mật Khẩu Mới Của Bạn Là : ' . $newpass . '';


                    $mail->AltBody = '';
                    $mail->send();
                    // echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                header('location: /login');
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header('location: /');
        }
    }

    public function xl_order()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["button_order"])) {
                //var_dump($_POST);
                $order = new orderModel();
                $order->setIdUser($_POST["id_user"]);
                $order->setUserName(trim($_POST["username"]));
                $order->setPhone(trim($_POST["phone"]));
                $order->setEmail(trim($_POST["email"]));
                $order->setAddress(trim($_POST["address"]));
                $order->setZipCode(trim($_POST["zipcode"]));
                $order->setTongDh(trim($_POST["tongdh"]));
                $order->setTrangThai(trim($_POST["trangthai"]));
                $order->setGhiChu(trim($_POST["ghichu"]));
                $email = $order->getEmail();
                $order->addOrder($order);
                $last_insert_order = new orderModel;
                $id_order = $last_insert_order->lastIdOrder();




                if (isset($_SESSION["cart"])) {
                    $cart = $_SESSION["cart"];
                    for ($i = 0; $i < sizeof($cart); $i++) {
                        $sp = new productModel;
                        $sp->setId($cart[$i][0]);
                        $product = $sp->get_one_product($sp);
                        for ($j = 0; $j < sizeof($product); $j++) {
                            $product_quantity_db = $product[$j][6];
                            $reduce_quantity = (int) $product_quantity_db - (int) $cart[$i][3];
                            //echo $reduce_quantity;
                            $sp->setQuantity($reduce_quantity);
                            $sp->reduceQuantity($sp);
                        }
                        //var_dump($product[0][6]);
                        $order_detail = new orderDetailModel();
                        $order_detail->setId_sp(trim($cart[$i][0]));
                        $order_detail->setIdDh(trim($id_order[0][0]));
                        $order_detail->setQuantity(trim($cart[$i][3]));
                        $order_detail->setTongDh(trim($cart[$i][2] * $cart[$i][3]));
                        //var_dump($order_detail);
                        $order_detail->addOrder_deltail($order_detail);
                    }
                }

                $content_email_or_detail = "";
                $content_email_or = "";
                // Load order detail
                $mailer_detail = new orderDetailModel();
                $mailer_detail->setIdDh($id_order[0][0]);
                var_dump($mailer_detail->getIdDh());
                $mailer_or_detail = $mailer_detail->loadOrder_DetailEmail($mailer_detail);

                // Load order 
                $mailer = new orderModel;
                $mailer->setIdDh($id_order[0][0]);
                $mailer_or = $mailer->loadOrderEmail($mailer);
                var_dump($mailer->getIdDh());
                extract($mailer_or);
                $content_email_or .= '
                <p>Tên Khách Hàng : <strong>' . $mailer_or[0]['username'] . ' </strong> </p>
                <p>Email : <strong>' . $mailer_or[0]['email'] . ' </strong> </p>
                <p>Phone : <strong>' . $mailer_or[0]['phone'] . ' </strong> </p>
                <p>Địa Chỉ : <strong>' . $mailer_or[0]['address'] . ' </strong> </p>
                <p>Trạng Thái Đơn Hàng : <strong>' . $mailer_or[0]['trangthai'] . ' </strong> </p>
                <p>Ngày Đặt Hàng : <strong>' . $mailer_or[0]['ngaydat'] . ' </strong> </p>
                <p>Zipcode : <strong>' . $mailer_or[0]['zipcode'] . ' </strong> </p>
                <p>Phí Ship : <strong>40000</strong> </p>
                <p>Tông Hóa Đơn : <strong>' . $mailer_or[0]['tongdh'] . ' </strong> </p>
                ';

                $stt = 1;
                for ($i = 0; $i < sizeof($mailer_or_detail); $i++) {
                    extract($mailer_or_detail);
                    $content_email_or_detail .= '
                   
                            <tr>
                            <td>' . $stt . '</td>
                            <td>' . $mailer_or_detail[$i]['name_pro'] . '</td>
                            <td>' . $mailer_or_detail[$i]['price_pro'] . '</td>
                            <td>' . $mailer_or_detail[$i]['soluong_pro'] . '</td>
                            <td>' . $mailer_or_detail[$i]['tong_1_sp'] . '</td>
                            </tr>
    
                     ';
                    $stt++;
                }




                // Gửi Mail khi thanh toán thành công !
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                    $mail->isSMTP(); // gửi mail SMTP
                    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'ntbinh14122004@gmail.com'; // SMTP username
                    $mail->Password = 'itht atsz wtyj fhlf'; // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port = 587; // TCP port to connect to
                    //Recipients
                    $mail->setFrom('ntbinh14122004@gmail.com', 'Mailer');
                    $mail->addAddress($email, 'Joe User'); // Add a recipient
                    // $mail->addAddress('ellen@example.com'); // Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    //  $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                    // Attachments
                    //  $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
                    //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
                    // Content
                    $mail->isHTML(true);   // Set email format to HTML
                    $mail->Subject = 'Chu de email';

                    $mail->Body = $content_email_or . ' <table border = "1">
                                        <tr>
                                                <td>Stt</td>
                                                <td>Name</td>
                                                <td>Price</td>
                                                <td>SoLuong</td>
                                                <td>Gia</td>
                                                </tr>
                                        ' .  $content_email_or_detail . '  
                                    </table>';


                    $mail->AltBody = '';
                    $mail->send();
                    // echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                $_SESSION['cart'] = [];
                header('location: /order_confirm');
            }
        }
    }

    public function xl_edit_user()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // button cancel
            if (isset($_POST["button_cancel"])) {
                header('location: /');
            }
            // button Update
            if (isset($_POST["button_update"])) {
                $user = new userModel();
                $user->setIdUser($_POST["id_user"]);
                $user->setUserName($_POST["username"]);
                $user->setFullName($_POST["fullname"]);
                $user->setEmail($_POST["email"]);
                $user->setPhone($_POST["phone"]);
                $user->setAddress($_POST["address"]);
                //var_dump($user);
                $validator = new form_validatorModel($_POST);
                $validator->required("username");
                $validator->required("email");

                $user->updateUser($user);
                $result = $user->get_user_by_id($user);
                // Sau khi cập nhật user -> cập nhật lại SESSION['user']
                $_SESSION['user'] = $result;

                if ($validator->isValid()) {
                    echo "Thành Công";
                } else {
                    foreach ($validator->errors as $field => $error) {
                        echo "<span style='color:red;font-weight:bold'>$error</span>";
                    }
                }

                $this->edit_user();
            }
        }
    }

    public function xl_change_password()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['button_cancel'])) {
                header('location: /edit_user');
            }
            if (isset($_POST['button_updatePassWord'])) {
                $now_pass = $_POST['password'];
                $new_pass = $_POST['newPassword'];
                $confirm_pass = $_POST['confirmPassword'];
                $validator = new form_validatorModel($_POST);
                $validator->required('password');
                $validator->required('newPassword');
                $validator->required('confirmPassword');
                $validator->minLength('newPassword', '5');
                $validator->maxLength('newPassword', '20');
                $validator->equalTo('newPassword', 'confirmPassword');
                $user = new userModel();
                $user->setIdUser($_POST['id_user']);
                $result = $user->get_user_by_id($user);

                //var_dump($user);
                // var_dump(md5($now_pass));
                // var_dump($result[0]['password']);
                if ($validator->isValid()) {
                    if (md5($now_pass) == $result[0]['password']) {
                        $user->setPassWord(md5($new_pass));

                        $user->changePass($user);
                        $alert = "Cập Nhật Mật Khẩu Thành Công !";
                        require 'app/view/changePassword.php';
                    } else {
                        $error = "Sai Mật Khẩu";
                        require 'app/view/changePassword.php';
                    }
                } else {
                    foreach ($validator->errors as $field => $error) {
                        echo "<span style='color:red;font-weight:bold'>$error</span>";
                        exit();
                    }
                }
            }
        }
    }

    public function admin()
    {
        include "app/view/admin/header.php";
        include "app/view/admin/admin.php";
        //include "app/view/admin/footer.php";
    }

    public function list_product_admin()
    {
        $sp = new productModel;
        $list_product =  $sp->getAllProduct();
        include "app/view/admin/header.php";
        include "app/view/admin/product/listProduct.php";
    }
    public function add_product_admin()
    {
        include "app/view/admin/header.php";
        include "app/view/admin/product/addProduct.php";
    }
    public function update_product_admin()
    {
        if (isset($_GET['id'])) {

            $sp = new productModel;
            $sp->setId($_GET['id']);
            $product = $sp->getmotsp($_GET['id']);
        }
        include "app/view/admin/header.php";
        include "app/view/admin/product/updateProduct.php";
    }

    public function xl_add_product_admin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // button cancel
            if (isset($_POST["button_addProduct"])) {
                $product = new productModel;
                $product->setName(trim($_POST["name"]));
                $product->setPrice(trim($_POST["price"]));
                $product->setQuantity(trim($_POST["quantity"]));
                $product->setDecribe(trim($_POST["description"]));
                $product->addProduct($product);
                $alert = "Thêm sản phẩm mới thành công";
                //var_dump($product);
            }
        }

        include "app/view/admin/header.php";
        include "app/view/admin/product/addProduct.php";
    }


    public function xl_update_product_admin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // button cancel
            if (isset($_POST["button_updateProduct"])) {
                $product = new productModel;
                $product->setId(trim($_POST["product_id"]));
                $product->setName(trim($_POST["name"]));
                $product->setPrice(trim($_POST["price"]));
                $product->setQuantity(trim($_POST["quantity"]));
                $product->setImage($_FILES["image"]["name"]);
                $product->setDecribe(trim($_POST["description"]));
                $product->updateProduct($product);
                $alert = "Cập nhật sản phẩm thành công";
                //var_dump($product);
            }
        }
        $this->list_product_admin();
    }

    public function xl_update_order()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['updateTrangthai'])) {
                //var_dump($_POST);
                if (isset($_POST['update'])) {
                    $order = new orderModel;
                    foreach ($_POST['update'] as $updateid) {

                        $order->setTrangThai($_POST['trangthai_' . $updateid]);
                        $order->setIdDh($updateid);
                        $email = $_POST["email"];

                        if ($order->getTrangThai() != '') {
                            $order->update_trangthai($order);
                            $content = $order->getTrangThai();
                            if ($content == 1) {
                                $content = "Đang Chuẩn Bị Hàng";
                            } else if ($content == 2) {
                                $content = "Đang trên đường giao";
                            } else if ($content == 3) {
                                $content = "Giao Thành Công";
                            } else {
                                $content = "Chưa giao";
                            }
                            // Gửi Mailer khi đơn hàng cập nhật trạng thái
                            $mail = new PHPMailer(true);
                            try {
                                //Server settings
                                $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                                $mail->isSMTP(); // gửi mail SMTP
                                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                                $mail->SMTPAuth = true; // Enable SMTP authentication
                                $mail->Username = 'ntbinh14122004@gmail.com'; // SMTP username
                                $mail->Password = 'itht atsz wtyj fhlf'; // SMTP password
                                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                                $mail->Port = 587; // TCP port to connect to
                                //Recipients
                                $mail->setFrom('ntbinh14122004@gmail.com', 'Mailer');
                                $mail->addAddress($email, 'Joe User'); // Add a recipient
                                // $mail->addAddress('ellen@example.com'); // Name is optional
                                // $mail->addReplyTo('info@example.com', 'Information');
                                //  $mail->addCC('cc@example.com');
                                // $mail->addBCC('bcc@example.com');
                                // Attachments
                                //  $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
                                //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
                                // Content
                                $mail->isHTML(true);   // Set email format to HTML
                                $mail->Subject = 'Thư Thông Báo Tình Trạng Đơn Hàng';

                                $mail->Body = 'Tình Trạng Đơn Hàng Của Bạn : ' . $content . '';


                                $mail->AltBody = '';
                                $mail->send();
                                // echo 'Message has been sent';
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                            header('location: /list_order_admin');
                        } else {
                            echo 'Lỗi !!';
                        }
                    }
                }
            }
        }
    }


    public function del_product()
    {
        if (isset($_GET['id'])) {
            //echo $_GET['id'];
            $product = new productModel;
            $product->setId(trim($_GET['id']));
            $product->deleteProduct($product);
            $alert_del = "Xóa thành công !";
            $this->list_product_admin();
        }
    }

    public function list_order_admin()
    {
        $order = new orderModel();
        $list_orders =  $order->listOrder();
        include "app/view/admin/header.php";
        include "app/view/admin/orders/listOrder.php";
    }

    public function list_order_detail_admin()
    {
        if (isset($_GET['id_dh'])) {
            $detail = new orderDetailModel();
            $detail->setIdDh($_GET['id_dh']);
            $list_order_detail = $detail->loadOrder_DetailEmail($detail);
            include "app/view/admin/header.php";
            include "app/view/admin/orders/listOrderDetail.php";
        }
    }

    public function chart()
    {
        $chart = new orderModel();
        $list_chart =  $chart->getAllOrder();
        var_dump($list_chart);
    }

    public function xl_chart_by_month()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["button_filler"])) {
                $order = new orderModel();
                $month = trim($_POST["month"]);

                //echo $start_of_month;

                $order->get_orders_by_month($month);

                //$this->admin($list_chart_by_month);
            }
        }
    }
}
