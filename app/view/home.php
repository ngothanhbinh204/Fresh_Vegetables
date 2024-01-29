<?php
// New Product

use App\model\productModel;

$sp_new = new productModel();
$list_item_news = $sp_new->loadItem($sp_new->get_new_sp());
// Sale Product
$sp_sale = new productModel();
$list_item_sales = $sp_sale->loadItem($sp_sale->get_sales_sp());
// Most View Product
$sp_most_view1 = new productModel();
$list_item_most_views1 = $sp_most_view1->loadItemMostView($sp_most_view1->get_most_view_sp1());

$sp_most_view2 = new productModel();
$list_item_most_views2 = $sp_most_view2->loadItemMostView($sp_most_view2->get_most_view_sp2());

$sp_most_view3 = new productModel();
$list_item_most_views3 = $sp_most_view3->loadItemMostView($sp_most_view3->get_most_view_sp3());

// Lab2
// $dongphuc = new dongphuc("PS30045", "Ngô Thanh Bình", "cam");
// $dongphuc->hienthi();

// $ongvang = new ongvang("PS30045", "Trần Văn A", 9.5);
// $ongvang->hienthi();
?>

<!-- home page slider -->

<div class="homepage-slider">
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Fresh & Organic</p>
                            <h1>Delicious Seasonal Fruits</h1>
                            <div class="hero-btns">
                                <a href="shop.html" class="boxed-btn">Fruit Collection</a>
                                <a href="contact.html" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Fresh Everyday</p>
                            <h1>100% Organic Collection</h1>
                            <div class="hero-btns">
                                <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                <a href="contact.html" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-right">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Mega Sale Going On!</p>
                            <h1>Get December Discount</h1>
                            <div class="hero-btns">
                                <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                <a href="contact.html" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end home page slider -->

<!-- features list section -->
<div class="list-section pt-80 pb-80">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="content">
                        <h3>Free Shipping</h3>
                        <p>When order over $75</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <h3>24/7 Support</h3>
                        <p>Get support all day</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="content">
                        <h3>Refund</h3>
                        <p>Get refund within 3 days!</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3> Sản Phẩm <span class="orange-text">Mới Nhất</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?= $list_item_news ?>
            <!-- <div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="../../public/assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div> -->
        </div>
    </div>
</div>
<!-- end product section -->

<!-- sale product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3> Sản Phẩm <span class="orange-text">Nhiều Lượt Xem</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Chia 2 -->
            <?= $list_item_most_views1 ?>
            <!-- Chia 2 -->


            <!-- Chia 2 -->
            <div class="col-lg-6 col-md-6 text-center">
                <!-- Chia 4 -->
                <!-- Chia 4 - 2 trên -->
                <div class="row">

                    <?= $list_item_most_views2 ?>

                </div>
                <!-- Chia 4 - 2 dưới -->
                <div class="row">

                    <?= $list_item_most_views3 ?>
                </div>

            </div>
            <!-- Chia 2 -->

        </div>
    </div>

</div>
<!-- end product section -->

<!-- Most Views product section -->

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3> Sản Phẩm <span class="orange-text">Sale</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?= $list_item_sales ?>
        </div>
    </div>

</div>
<!-- end Most Views product section -->

<!-- cart banner section -->
<section class="cart-banner pt-100 pb-100">
    <div class="container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-lg-6">
                <div class="image">
                    <div class="price-box">
                        <div class="inner-price">
                            <span class="price">
                                <strong>30%</strong> <br> off per kg
                            </span>
                        </div>
                    </div>
                    <img src="../../public/assets/img/a.jpg" alt="">
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-lg-6">
                <h3><span class="orange-text">Deal</span> of the month</h3>
                <h4>Hikan Strwaberry</h4>
                <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit voluptatem accusant</div>
                <!--Countdown Timer-->
                <div class="time-counter">
                    <div class="time-countdown clearfix" data-countdown="2020/2/01">
                        <div class="counter-column">
                            <div class="inner"><span class="count">00</span>Days</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">00</span>Hours</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">00</span>Mins</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">00</span>Secs</div>
                        </div>
                    </div>
                </div>
                <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            </div>
        </div>
    </div>
</section>
<!-- end cart banner section -->

<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="../../public/assets/img/avaters/avatar1.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Saira Hakim <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="../../public/assets/img/avaters/avatar2.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>David Niph <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="../../public/assets/img/avaters/avatar3.png" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Jacob Sikim <span>Local shop owner</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonail-section -->

<!-- advertisement section -->
<div class="abt-section mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg">
                    <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <p class="top-sub">Since Year 1999</p>
                    <h2>We are <span class="orange-text">Fruitkha</span></h2>
                    <p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p>
                    <a href="about.html" class="boxed-btn mt-4">know more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end advertisement section -->

<!-- shop banner -->
<section class="shop-banner">
    <div class="container">
        <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
        <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
        <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
    </div>
</section>
<!-- end shop banner -->



<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="../../public/assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="../../public/assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="../../public/assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="../../public/assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="../../public/assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->