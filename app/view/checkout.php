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
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Check Out Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<?php
			$value_idUser = "";
			$value_name = "";
			$value_email = "";
			$value_phone = "";
			$value_address = "";
			$value_zipcode = "";
			$value_trangthai = "Chưa Thanh Toán";
			if (isset($_SESSION["user"])) {
				$date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh'));
				$time = $date->format('siHdmY');
				$user = $_SESSION["user"];

				$value_idUser = $user[0]["id_user"];
				$value_name = $user[0]["username"];
				$value_zipcode = $user[0]["username"] . rand(0, 999) . $time;
				$value_email = $user[0]["email"];
				$value_phone = $user[0]["phone"];
				$value_address = $user[0]["address"];
			}
			?>
			<form action="/xl_order" method="post">

				<div class="row">

					<div class="col-lg-8">
						<div class="checkout-accordion-wrap">
							<div class="accordion" id="accordionExample">

								<div class="card single-accordion">
									<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Billing Address
											</button>
										</h5>
									</div>

									<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body">
											<div class="billing-address-form">
												<input type="hidden" name="id_user" value="<?= $value_idUser ?>">
												<input type="hidden" name="zipcode" value="<?= $value_zipcode ?>">
												<p><input name="username" type="text" placeholder="Name" value="<?= $value_name ?>"></p>
												<p><input name="email" type="email" placeholder="Email" value="<?= $value_email ?>"></p>
												<p><input name="address" type="text" placeholder="Address" value="<?= $value_address ?>"></p>
												<p><input name="phone" type="tel" placeholder="Phone" value="<?= $value_phone ?>"></p>
												<p><input name="trangthai" type="hidden" placeholder="Trạng Thái" value="<?= $value_trangthai ?>"></p>
												<p><textarea name="ghichu" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
											</div>
										</div>
									</div>
								</div>

								<div class="card single-accordion">
									<div class="card-header" id="headingTwo">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Shipping Address
											</button>
										</h5>
									</div>
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
										<div class="card-body">
											<div class="shipping-address-form">
												<p>Your shipping address form is here.</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card single-accordion">
									<div class="card-header" id="headingThree">
										<h5 class="mb-0">
											<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Card Details
											</button>
										</h5>
									</div>
									<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
										<div class="card-body">
											<div class="card-details">
												<p>Your card details goes here.</p>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-4">
						<div class="order-details-wrap">
							<table class="order-details">
								<thead>
									<tr>
										<th>Image</th>
										<th>Orders Details</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>

								<tbody class="order-details-body">
									<?php
									$subTotal = 0;
									$shipping = 0;
									if (isset($_SESSION["cart"])) {
										$cart = $_SESSION["cart"];
										$shipping = 4000;
										foreach ($cart as $item) {
											echo '
										<tr>
										<td class="product-image"><img src="../../public/assets/img/products/' . $item[4] . '" alt=""></td>
										<td>' . $item[1] . '</td>
										<td>x ' . $item[3] . '</td>
										<td>$' . $item[2] * $item[3] . '</td>
									</tr>
										';
											$subTotal += ($item[2] * $item[3]);
										}
									}
									?>
								</tbody>

								<tbody class="checkout-details">
									<tr>
										<td>Subtotal</td>
										<td></td>
										<td></td>
										<td>$<?= $subTotal ?></td>
									</tr>
									<tr>
										<td>Shipping</td>
										<td></td>
										<td></td>
										<td>$<?= $shipping ?></td>
									</tr>
									<tr>
										<td>Total</td>
										<td></td>
										<td></td>
										<td>$<?= ($subTotal + $shipping) ?></td>
										<input type="hidden" name="tongdh" value="<?= ($subTotal + $shipping) ?>">
									</tr>
								</tbody>
							</table>
							<!-- <a href="" class="boxed-btn">Place Order</a> -->
							<input name="button_order" type="submit" value="Thanh Toán">
						</div>
					</div>
				</div>
			</form>
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