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
				<div class="col-md-3 no-padding logo">
					simplify healthcare.
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-1 no-padding value">
					location<br>
					<span id="location">location</span>
				</div>
				<div class="col-md-1 no-padding value">
					age<br>
					<span id="age">age</span>
				</div>
				<div class="col-md-1 no-padding value">
					income<br>
					<span id="income">income</span>
				</div>
			</div>


			<div class="row">
				<!--<div class="col-md-2 sidebar">
					
				</div>-->
				<div class="col-md-12">
					<div class="container-fluid plans">
						<div class="row" style="padding-left: 12px; margin-bottom: 20px;">
							<span style="font-size: 18px; font-weight: 600; color: #333333; padding: 0px;">ALL PLANS</span>
							Plans that match your specific criteria.
						</div>
						<div id="card-container" class="row card-container">
							<div id="bronze" class="col-md-3">
								BRONZE
							</div>
							<div id="silver" class="col-md-3">
								SILVER
							</div>
							<div id="gold" class="col-md-3">
								GOLD
							</div>
							<div id="platinum" class="col-md-3">
								PLATINUM
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<script src="./assets/js/healthPlans.js"></script>
	</body>
</html>