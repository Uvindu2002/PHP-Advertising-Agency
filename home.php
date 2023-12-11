<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>nav bar</title>

	<link rel="stylesheet" type="text/css" href="homeSrc/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	
</head>
<body>

	<section class="header">
		<nav>
			<a href="">Ad World</a>
			<div class="nav-links" id="navLinks">
				<i class='bx bx-chevrons-up' onclick="hideMenu()" ></i>
				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="#aboutus">About</a></li>
					<li><a href="contactUs.php">Contact Us</a></li>
				</ul>
			</div>
			<i class='bx bx-menu' onclick="showMenu()"></i>
		</nav>

		<div class="text-box">
			<h1>You have found the best ad network for advertisers</h1>
			<a href="signUpAd.php" class="hero-btn">Join with Us</a>
		</div>
	</section>

	<section class="chooseUs">
		<h1>Why choose us</h1>
		<p></p>

		<div class="row">
			<div class="chooseUs-col">
				<h3>Three-Level Security</h3>
				<p>Adworld utilizes an effective combination of innovative in-house and reliable third-party fraud detection systems, as well as a proper human check, and provides you with the safest experience possible.</p>
			</div>
			<div class="chooseUs-col">
				<h3>Self-Serve Platform</h3>
				<p>Adworld provides an easy-to-use experience for those who prefer to work without a manager. We completely automated every process so that you have the opportunity to understand everything intuitively.</p>
			</div>
			<div class="chooseUs-col">
				<h3>Partner Care</h3>
				<p>More than just support. In addition to the 24/7 multilingual online chat, we will analyze your specific case and help you choose the most effective ad format and/or settings.</p>
			</div>
		</div>
		<div class="row">
			<div class="chooseUs-col">
				<h3>Multiple Ad Formats</h3>
				<p>Make more money with our vast variety of web and mobile ad formats: Popunder, Native Banners, Banners, Social Bar, Direct Link and VAST video.</p>
			</div>
			<div class="chooseUs-col">
				<h3>Tailored Payment Options</h3>
				<p>Become our partner without hassle! We integrated onboarding materials into your account to familiarize yourself quicker. And our lightning-fast moderation will allow you to get started in no time.</p>
			</div>
			<div class="chooseUs-col">
				<h3>Anti-Adblock</h3>
				<p>With Adworld, you have three anti-adblock options that can increase your revenue by an average of 35%. Never stop earning: the Adsterra code continues running even when detected by ad-stopping plugins.</p>
			</div>
		</div>
	</section>

	<section class="testimonials">
		<h1>What Our coustomer says</h1>

		<div class="row">
			<div class="testimonial-col">
				<img src="homeSrc/images/testi1.jpeg">
				<div>
					<p>A fantastic organisation! Great cutomer support from beginning to end of the process. The team are really informed and go the extra mile at every stage. I would recommend them unreservedly.</p>
					<h3>James Holder</h3>
				</div>
			</div>
			<div class="testimonial-col">
				<img src="homeSrc/images/testi2.jpg">
				<div>
					<p>Great service, efficient communication and a really easy way to get a mortgage with lots of help and support to get the right deal.</p>
					<h3>Stepheni Queen</h3>
				</div>
			</div>
		</div>

	</section>

	<section class="cta">
		<h3>Our team is always available to answer your queries.</h3>
		<a href="contactUs.php" class="hero-btn">Contact Us</a>
	</section>

	<section class="footer" id="aboutus">
		<h4>About US</h4>
		<p>AdWorld is a leading online advertising agency that specializes in helping businesses maximize their online presence and drive targeted traffic to their websites. With our extensive knowledge and expertise in digital marketing, we create innovative and effective strategies to help our clients achieve their marketing goals.</p>

		<p>At AdWorld, we understand the ever-evolving landscape of online advertising and stay up-to-date with the latest trends and technologies. Our team of experienced professionals is skilled in various aspects of digital advertising, including search engine optimization (SEO), pay-per-click (PPC) advertising, social media marketing, and display advertising.</p>

		<p>We believe in a data-driven approach, leveraging analytics and insights to optimize campaigns and deliver measurable results. Our dedicated team works closely with clients to understand their unique business objectives and tailor strategies that align with their goals and target audience.</p>

		<div class="icons">
			<i class='bx bxl-facebook'></i>
			<i class='bx bxl-twitter'></i>
			<i class='bx bxl-instagram'></i>
			<i class='bx bxl-linkedin'></i>
		</div>

		<p>Copyright &copy; 2023 AdWorld All Rights Reserved</p>
	</section>


	<script type="text/javascript">
		var navLinks = document.getElementById("navLinks");

		function showMenu() {
			navLinks.style.right = "0";
		}

		function hideMenu() {
			navLinks.style.right = "-200px";
		}
	</script>

</body>
</html>