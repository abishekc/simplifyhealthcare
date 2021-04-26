<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,900;1,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="./assets/fonts/fonts.css">

		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row nav">
				<div class="col-md-12 logo">
					simplify healthcare.
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row header">
				<div class="col-md-12">
					<h2>Health Plan Application</h2>
					<p>Fill in the following information below to get tailored plans for you:</p>
				</div>
			</div>

			<div class="row whole">
				<div class="col-md-2 tasks">
					The Basics<br>
					Utilization <br>
					Budgetary Constraints
				</div>
				<div class="col-md-8 main-app">					
					<h3>The Basics: Who Are you?</h3>
					<p>If you'd like to just browse plans, you only need to fill out this section.</p><br>
					<form action="/plans.php" method="get">
						<h6>ZIPCODE</h6>
					  	<input type="text" id="zipcode" name="zipcode" placeholder="777223">

					  	<h6>AGE</h6>
					 	<input type="text" id="age" name="age" placeholder="20">

					  	<h6>YEARLY INCOME</h6>
					  	<input type="text" id="income" name="income" placeholder="20,000">
					  
					  	<h6>BUDGET</h6>
					  	<input type="text" id="income" name="budget" placeholder="300 / month">
					  <input type="submit" value="SEARCH" style="font-weight: 600;">
					  <input type="radio" name="gender" value="Male"><span class="radio-text">MALE</span>
					  <input type="radio" name="gender" value="Female"><span class="radio-text">FEMALE</span>
					</form>
					<br><br><br><br>
					<hr>

					<h3>Utilization Information</h3>
					<p>Providing information on how you plan to use medical services can give you a better estimate on costs.</p><br>

					<h3>Budgetary Constraints</h3>
					<p>We'll try our best to keep everything under budget.</p><br>
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>



<!--<div class="row banner">
				<div class="col-md-9 no-padding main">
					<h1 class="tagline">MAKE HEALTHCARE<br>
					A PRIORITY TODAY.</h1><br>
					version a0.7<br>
					Versioning text and onboarding material will be presented here.<br><br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tristique ipsum<br> quis fermentum dapibus. Sed vel neque
					vel sem tincidunt porttitor. Ut elementum enim arcu, vitae hendrerit mi auctor et. Pellentesque gravida velit et lectus placerat faucibus.<br> 
					Phasellus maximus congue nulla, eu gravida diam fermentum a. Morbi viverra enim ante, nec pellentesque ipsum egestas eu. Suspendisse <br>
					 lectus sapien, dictum in ipsum vitae, consequat commodo mauris. Vivamus a odio sed mi interdum posuere. Mauris vehicula sagittis urna, quis porta dui tristique non.
				</div>
				<div class="col-md-3 no-padding init-form">
					<p>
						version a0.7 <br>
						Fill in the following information below to get tailored plans for you:
					</p><br>
					<form action="/plans.php" method="get">
					  <input type="text" id="zipcode" name="zipcode" placeholder="zipcode">
					  <input type="text" id="age" name="age" placeholder="age">
					  <input type="text" id="income" name="income" placeholder="yearly income">
					  <input type="text" id="income" name="budget" placeholder="budget">
					  <input type="submit" value="SEARCH" style="font-weight: 600;">
					</form>
				</div>
			</div>-->