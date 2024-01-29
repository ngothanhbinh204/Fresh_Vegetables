<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Cart</title>


</head>

<body>


    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-total">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="/xl_quantity_cart" method="post">


                                    <?php
                                    $html_cart = "";
                                    $html_form_quantity = "";
                                    $subTotal = 0;
                                    $shipping = 0;
                                    if (isset($_SESSION["cart"])) {
                                        $total_price = 0;
                                        $cart = $_SESSION["cart"];
                                        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                                            $total_price = $cart[$i]['2'] * $cart[$i]['3'];
                                            $shipping = 4000;
                                    ?>

                                            <tr class="table-body-row">
                                                <td class="product-remove"><a href="/cart?del_id=<?= $cart[$i]['0'] ?>"><i class="far fa-window-close"></i></a></td>
                                                <td class="product-image"><img src="../../public/assets/img/products/<?= $cart[$i]['4'] ?>" alt=""></td>
                                                <td class="product-name"><?= $cart[$i]['1'] ?> </td>
                                                <td class="product-price">$<?= $cart[$i]['2'] ?></td>

                                                <!-- Quantity -->
                                                <td class="product-quantity"><input type="number" name="quantity" min="0" value="<?= $cart[$i]['3'] ?>" placeholder="0"></td>
                                                <!-- <input name="button_xl_quantity" type="submit" value="Cập Nhật"> -->
                                                <input type="hidden" name="id_cart" value="<?= $cart[$i]['0'] ?>">
                                                <td class="product-total"><?= $total_price ?>
                                                <td>
                                                    <input name="button_xl_quantity" type="submit" value="Cập Nhật">
                                                </td>
                                                <td>

                                            </tr>
                                    <?php
                                            $subTotal += $total_price;
                                        }
                                    }
                                    ?>
                                </form>


                            </tbody>

                        </table>
                        <?php
                        if (count($_SESSION['cart']) > 0) {
                            echo '
                                <div class="cart-buttons">
                                <a href="/cart?del_all" class="boxed-btn black">Delete Cart</a>
                            </div>
                                ';
                        }
                        ?>



                    </div>
                </div>
                <!-- <form action="/xl_quantity_cart" method="post">
                    <td class="product-quantity"><input type="number" name="quantity" value="' . $cart[$i]['3'] . '" placeholder="0"></td>
                    <input name="button_xl_quantity" type="button" value="Cập Nhật">
                </form> -->

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td>$<?= $subTotal ?></td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$<?= $shipping ?></td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>$<?= ($subTotal + $shipping) ?></td>
                                    <input type="hidden" name="total_all_price" value="<?= ($subTotal + $shipping) ?>">
                                </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <!-- <a href="cart.html" class="boxed-btn">Update Cart</a> -->
                            <a href="/checkout" class="boxed-btn black">Check Out</a>
                            <!-- <input name="button_checkout" type="submit" value="Check Out"> -->
                            <?php
                            // $_SESSION['total_all_price'] = [($subTotal + $shipping)];
                            //var_dump($_SESSION['total_all_price']);
                            ?>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- end cart -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->


</body>

</html>