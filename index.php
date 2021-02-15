<!DOCTYPE html>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,900;1,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="style.css">

		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row nav">
				<div class="col-md-3 no-padding logo">
					simplify healthcare.
				</div>
				<div class="col-md-9 no-padding search">
					
				</div>
			</div>
			<div class="row banner">
				<div class="col-md-9 no-padding main">
					<h1 class="tagline">MAKE HEALTHCARE<br>
					A PRIORITY TODAY.</h1>

					We know it's difficult. 
				</div>
				<div class="col-md-3 no-padding init-form">
					<p>
						Fill in the following information below to get tailored plans for you:
					</p>
					<form action="/plans.php" method="get">
					  <input type="text" id="zipcode" name="zipcode" placeholder="zipcode">
					  <input type="text" id="age" name="age" placeholder="age">
					  <input type="text" id="income" name="income" placeholder="yearly income">
					  <input type="text" id="income" name="budget" placeholder="budget">
					  <input type="submit" value="SEARCH" style="font-weight: 600;">
					</form>
				</div>
			</div>
		</div>

		<!--<script>
			 let requestURL = "https://marketplace.api.healthcare.gov/api/v1/plans/search?apikey=d687412e7b53146b2631dc01974ad0a4";
			 let request = new XMLHttpRequest();
			 request.open('POST', requestURL);
			 request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
			 request.responseType = 'json';
			 request.send(
			 	JSON.stringify({
				    "household": {
				      "income": 42000,
				      "people": [
				        {
				          "aptc_eligible": true,
				          "dob": "1992-01-01",
				          "has_mec": false,
				          "is_pregnant": false,
				          "is_parent": false,
				          "uses_tobacco": false,
				          "gender": "Male",
				          "utilization_level": "Low"
				        }
				      ],
				      "has_married_couple": false
				    },
				    "market": "Individual",
				    "place": {
				      "countyfips": "17031",
				      "state": "IL",
				      "zipcode": "60647"
				    },
				    "limit": 10,
				    "offset": 0,
				    "order": "asc",
				    "year": 2020
				}));
			 request.onload = function() {
			 	const values = request. response;
			 	console.log(values);
			 }
		</script>-->
		

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	</body>
</html>