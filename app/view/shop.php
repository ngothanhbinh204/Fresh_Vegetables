<?php

use App\model\productModel;

$sp = new productModel();
$limit = !empty($_GET['per_page']) ? $_GET['per_page'] : 3;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại
$offset = ($current_page - 1) * $limit;
$products = $sp->getdata_limit($offset, $limit);

$records = $sp->getAllProduct();
$totalRecords = count($records);
$totalPages = ceil($totalRecords / $limit);

$class_active = "";

?>




<!-- product section -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <script language=javascript>
        function fPageseparate(page) {
            document.adminForm.txtPage.value = page;
            document.adminForm.submit();
        }
    </script>

    <!-- title -->
    <title>Shop</title>

</head>





<body>

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Strawberry</li>
                            <li data-filter=".berry">Berry</li>
                            <li data-filter=".lemon">Lemon</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row product-lists">
                <?php
                foreach ($products as $product) {
                    extract($product);
                ?>
                    <div class="col-lg-4 col-md-6 text-center berry">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/detail?id=<?= $Product_id ?>"><img src="../../public/assets/img/products/<?= $image ?>" alt=""></a>
                            </div>
                            <h3><?= $Name ?></h3>
                            <p class="product-price"><span>Per Kg</span> <?= $Price ?>$ </p>
                            <a href="/cart?id=<?= $Product_id ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                <?php } ?>


                <!-- <div class="col-lg-4 col-md-6 text-center berry">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
                        </div>
                        <h3>Berry</h3>
                        <p class="product-price"><span>Per Kg</span> 70$ </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center lemon">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
                        </div>
                        <h3>Lemon</h3>
                        <p class="product-price"><span>Per Kg</span> 35$ </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-4.jpg" alt=""></a>
                        </div>
                        <h3>Avocado</h3>
                        <p class="product-price"><span>Per Kg</span> 50$ </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-5.jpg" alt=""></a>
                        </div>
                        <h3>Green Apple</h3>
                        <p class="product-price"><span>Per Kg</span> 45$ </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center strawberry">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="assets/img/products/product-img-6.jpg" alt=""></a>
                        </div>
                        <h3>Strawberry</h3>
                        <p class="product-price"><span>Per Kg</span> 80$ </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div> -->
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <?php
                            $prev_page = "";
                            $next_page = "";
                            $first_page = "";
                            $last_page = "";
                            // First page
                            if ($current_page > 3) {
                                $first_page = 1;
                                echo ' <li><a href="/shop?per_page=' . $limit . '&page=' . $first_page . '"> FIRST </a></li> ';
                            }

                            // Prev page
                            if ($current_page > 1) {
                                $prev_page = $current_page - 1;
                                echo ' <li><a href="/shop?per_page=' . $limit . '&page=' . $prev_page . '"> < </a></li> ';
                            }

                            // Page
                            for ($i = 1; $i < $totalPages; $i++) {
                                if ($i != $current_page) {
                                    if ($i > $current_page - 3 && $i < $current_page + 3) {
                                        echo ' <li><a href="/shop?per_page=' . $limit . '&page=' . $i . '">' . $i . '</a></li> ';
                                    }
                                } else {
                                    echo ' <li><a class="active">' . $i . '</a></li> ';
                                }
                            }

                            // Next page
                            if ($current_page < $totalPages - 1) {
                                $next_page = $current_page + 1;
                                echo ' <li><a href="/shop?per_page=' . $limit . '&page=' . $next_page . '"> > </a></li> ';
                            }

                            // Last Page
                            if ($current_page < $totalPages - 3) {
                                $last_page = $totalPages;
                                echo ' <li><a href="/shop?per_page=' . $limit . '&page=' . $last_page . '"> LAST </a></li> ';
                            }
                            ?>


                            <!-- <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Pagination Product -->
            <!-- <div class="data-container"></div>
            <div id="pagination-productAll">

            </div> -->



        </div>
    </div>
    <!-- end products -->

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

<!-- <script>
    // Tải mảng từ PHP
    var array = JSON.parse(document.querySelector('script').textContent);
    // Xuất mảng
    console.log(array);
</script> -->


<!-- <script type="text/javascript" src="public/js/jquery.1.7.2.min.js"></script> -->
<!-- <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        function load() {

            phantrang(1);

        }

        function phantrang(page) {

            $('.loading').html("<img src='public/images/loading.gif'/>").fadeIn('fast');

            $.ajax({

                type: "get",

                url: "view/shop.php",

                data: {
                    page: page
                },

                success: function(data) {

                    $('.loading').fadeOut('fast');

                    $(".allproduct").html(data);

                    alert(data);

                }

            });

        }

        load();
        $("ul.phantrang li").live("click", function() {

            var page = $(this).attr('page');

            phantrang(page);

            alert(page);

        });
    });
</script> -->




</html>