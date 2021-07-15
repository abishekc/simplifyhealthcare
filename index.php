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
					<h2>Health Plan Explorer</h2>
					<p>Fill in the following information below to get tailored plans for you:</p>
				</div>
			</div>

			<div class="row whole">
				<div class="col-md-2 tasks">
					<img src="./assets/images/create.png" width="18"/>&nbsp;&nbsp; The Basics<br>
					<img src="./assets/images/use.png" width="18"/>&nbsp;&nbsp; Utilization <br>
					<img src="./assets/images/tag.png" width="18"/>&nbsp;&nbsp; Budgetary Constraints
				</div>
				<div class="col-md-8 main-app">
					<div class="header" style="margin-top: 0px;">				
						<h3>The Basics: Who Are you?</h3>
						<p>If you'd like to just browse plans, you only need to fill out this section.</p>
					</div><br>
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
					<div class="header" style="margin-top: 0px;">
						<h3>Utilization Information</h3>
						<p>Providing information on how you plan to use medical services can give you a better estimate on costs.</p>
					</div><br>
					<h6>HOW MANY TIMES A YEAR DO YOU SEE YOUR DOCTOR?</h6>
					<input type="text" placeholder="2 / year">
					
					<h6>HOW MANY PRESCRIPTIONS DO YOU HAVE?</h6>
					<input type="text" placeholder="3">

					<h6>DO YOU WEAR GLASSES?</h6>
					<input type="text" placeholder="yes">

					<br><br><br>
					<div class="header" style="margin-top: 0px;">
						<h3>Budgetary Constraints</h3>
						<p>We'll try our best to keep everything under budget.</p>
					</div><br>
					<h6>WHAT DO YOU SPEND ON HEALTHCARE NOW?</h6>
					  	<input type="text" placeholder="$0">

					  	<h6>MONTHLY BUDGET</h6>
					 	<input type="text" placeholder="$215">
					<br>
				</div>
				<div class="col-md-2 tasks">
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row nav">
				<div class="col-md-12 logo">  
					simplify healthcare
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>