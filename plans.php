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
				<div class="col-md-2 sidebar">
					
				</div>
				<div class="col-md-10">
					<div class="container-fluid plans">
						<div class="row" style="padding-left: 12px; margin-bottom: 20px;">
							<span style="font-size: 18px; font-weight: 600; color: #333333; padding: 0px;">ALL PLANS</span>
							Plans that match your specific criteria.
						</div>
						<div id="card-container" class="row card-container">
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function findGetParameter(parameterName) {
			    var result = null,
			        tmp = [];
			    location.search
			        .substr(1)
			        .split("&")
			        .forEach(function (item) {
			          tmp = item.split("=");
			          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
			        });
			    return result;
			}

			console.log(findGetParameter("zipcode"));
			document.getElementById("location").innerText = findGetParameter("zipcode");
			document.getElementById("age").innerText = findGetParameter("age");
			document.getElementById("income").innerText = findGetParameter("income");
		</script>

		<script>
			var fullCounties;
			 let requestURLOne = "https://marketplace.api.healthcare.gov/api/v1/counties/by/zip/"
			 let requestURLTwo = findGetParameter("zipcode");
			 let requestURLThree = "?apikey=d687412e7b53146b2631dc01974ad0a4";
			 let requestURLZIP = requestURLOne.concat(requestURLTwo, requestURLThree);
			 let request = new XMLHttpRequest();
			 request.open('GET', requestURLZIP);
			 request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
			 request.responseType = 'json';
			 request.send();
			 request.onload = function() {
			 	const values = request.response;
			 	console.log(values);
			 	console.log(values.counties[0].fips);
			 	var currOffset = 0;
			 	fullCounties = values.counties;
			 	findHealthPlans(values.counties, currOffset);
			 }
		</script>

		<script type="text/javascript">
			let cardContainer;

			let createTaskCard = (task) => {
				let col = document.createElement('div');
				col.className = 'col-md-2';

			    let card = document.createElement('div');
			    card.className = 'card cursor-pointer';

			    let cardBody = document.createElement('div');
			    cardBody.className = 'card-body';

			    let title = document.createElement('h5');
			    title.innerText = task.name;
			    title.className = 'card-title';

			    let color = document.createElement('div');
			    let premHeading = "Premium: $";
			    color.innerText = premHeading.concat(task.premium);
			    color.className = 'card-color';

			    let deductible = document.createElement('div');
			    let dedHeading = "Deductible: $";
			    deductible.innerText = dedHeading.concat(task.deductibles[0].amount);

			    
			    cardBody.appendChild(title);
			    cardBody.appendChild(color);
			    cardBody.appendChild(deductible);
			    card.appendChild(cardBody);
			    col.appendChild(card);
			    cardContainer.appendChild(col);
			}
		</script>

		<script>
			function findHealthPlans(geography, offset_val) {
				 let requestURL = "https://marketplace.api.healthcare.gov/api/v1/plans/search?apikey=d687412e7b53146b2631dc01974ad0a4";
				 let request = new XMLHttpRequest();
				 request.open('POST', requestURL);
				 request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
				 request.responseType = 'json';
				 request.send(
				 	JSON.stringify({
					    household: {
					      people: [
					        {
					          age: 21,
					          gender: "Female",
					          utilization_level: "Low"
					        }
					      ]
					    },
					    market: "Individual",
					    place: {
					      countyfips: geography[0].fips,
					      state: geography[0].state,
					      zipcode: geography[0].zipcode
					    },
					    limit: 10,
					    offset: offset_val,
					    order: "asc"
					}));
				 request.onload = function() {
				 	const values = request.response;
				 	console.log(values);
				 	console.log(values.plans[0].name);

				    cardContainer = document.getElementById('card-container');
				    values.plans.forEach((task) => {
				        createTaskCard(task);
				    });
				    console.log(values.total);
				    var tot = values.total;
				    console.log(offset_val);
				    if(offset_val < (tot - 10)) {
				    	console.log("here");
				 		findHealthPlans(fullCounties, offset_val + 10);
				 		tot = tot - 10;
			 		}
				 }
			}
		</script>
	</body>
</html>