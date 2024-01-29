	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="services.html">Shop</a></li>
							<li><a href="news.html">News</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- pagination -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="../../public/paginationjs-master/src/pagination.js"></script> -->

	<!-- jquery -->
	<script src="../../public/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../../public/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../../public/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../../public/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../../public/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../../public/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../../public/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../../public/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../../public/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="../../public/assets/js/main.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="../../public/paginationjs-master/src/pagination.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			var action = "search";
			$("#search-input").keyup(function() {
				var search_input = $("#search-input").val();
				if (search_input != '') {
					$.ajax({
						url: "app/model/search.php",
						method: "POST",
						data: {
							action: action,
							search_input: search_input
						},
						success: function(data) {
							$("#output_search").html(data);
						}
					});
					console.log(action);
				} else {
					$("#output_search").html('');
				}
			});
		});
	</script>