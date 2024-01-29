<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Fruitkha - Slider Version</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="../../public/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../../public/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../../public/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../../public/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../../public/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../../public/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../../public/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../../public/assets/css/main.css">
	<!-- responsive -->
	<!-- <link rel="stylesheet" href="../../public/assets/css/responsive.css">
	<link href="../../public/paginationjs-master/dist/pagination.css" rel="stylesheet" type="text/css"> -->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>



</head>


<body>

	<!--PreLoader-->
	<!-- <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div> -->
	<!--PreLoader Ends-->

	<!-- header -->

	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="/">
								<img src="../../public/assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="/">Home</a>

								</li>
								<li><a href="/about">About</a></li>
								<li><a href="/mailer">Mailer</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="/about">About</a></li>
										<li><a href="/cart">Cart</a></li>
										<li><a href="/checkout">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="/shop">Shop</a></li>
									</ul>
								</li>
								<li><a href="/news">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li>
								<li><a href="/contact">Contact</a></li>

								<!-- bên phải -->
								<li>

								</li>
								<li>
									<?php if (isset($_SESSION['user'])) {
										$user = $_SESSION['user'];
									?>

										<a href=""><?= $user[0]['username'] ?></a>
										<ul class="sub-menu">
											<li><a href="/edit_user">Cập Nhật Tài Khoản</a></li>
											<li><a href="/logout">Đăng Xuất</a></li>
										</ul>


									<?php } else { ?>
								<li>
									<a class="mobile-hide " href="/register"> <i class="fas fa-use">Đăng Ký</i> </a>
								</li>
								<li>
									<a class="mobile-hide boxed-btn " href="/login"> <i class="fas fa-use">Đăng Nhập</i> </a>
								</li>
							<?php } ?>

							</li>
							<li>
								<?php

								if (isset($_SESSION['user'])) {
									$user = $_SESSION['user'];
									if ($user[0]['avata'] != "") {
										echo '
											<a href="">
											<div class="client-avater">
												<img src="../../public/uploads/' . $user[0]['avata'] . '" alt="">
											</div>
		
										</a>
											';
									}
								}
								?>

								<a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i></a>
								<a class="mobile-hide search-bar-icon" href="#"> <i class="fas fa-search"></i> </a>
							</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>

						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">



						<!-- <ul class="show_book_seach" id="output_search"></ul> -->
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<form method="POST" class="search-model-form">
								<input type="search" name="search-input" id="search-input" placeholder="Nhập Tên Sẩn Phẩm ...">
							</form>
							<div class="grid_search" id="output_search"></div>

							<!-- <button type="submit">Search <i class="fas fa-search"></i></button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->







</body>

</html>