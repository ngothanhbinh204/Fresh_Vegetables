<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Check Out</title>

</head>

<body>

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section-done-order breadcrumb-done-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Fresh and Organic</p>
                        <h1>Thanh Toán Thành Công</h1>
                        <img src="../../public/image/banner/logo_done_order.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">



            <div class="row">

                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">

                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Hóa Đơn Đã Thanh Toán
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body-confirm">
                                        <?php
                                        $pttt = "";
                                        switch ($result[0]['pttt']) {
                                            case 1:
                                                $pttt = "Thanh Toán Khi Nhận Hàng";
                                                break;
                                            case 2:
                                                $pttt = "Thanh Toán Ngân Hàng";
                                                break;
                                            case 3:
                                                $pttt = "Thanh Toán MoMo";
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>

                                        <div class="billing-address-form">
                                            <p>Tên Khách Hàng : <strong><?= $result[0]['username'] ?></strong></p>
                                            <p>Zipcode : <strong><?= $result[0]['zipcode'] ?></strong></p>
                                            <p>Email : <strong><?= $result[0]['email'] ?></strong></p>
                                            <p>Số Điện Thoại : <strong><?= $result[0]['phone'] ?></p>
                                            <p>Địa Chỉ : <strong><?= $result[0]['address'] ?></strong></p>
                                            <p>Ngày Đặt Hàng : <strong><?= $result[0]['ngaydat'] ?></strong></p>
                                            <p>Phương Thức Thanh Toán : <strong><?= $pttt ?></p>
                                            <p>Trạng Thái : <strong><?= $result[0]['trangthai'] ?></strong></p>
                                            <p>Tổng Hóa Đơn : <strong><?= $result[0]['tongdh'] ?></strong></p>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end check out section -->

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