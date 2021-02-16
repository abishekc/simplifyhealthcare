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
			<div id="card-container" class="row card-container">
				<div class="col-md-12">
					<div class="card">
						hello
					</div>
					<div class="card">
						hello
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
		</script>

		<script>
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
			 	findHealthPlans(values.counties);
			 }
		</script>

		<script type="text/javascript">

			let cardContainer;

			let createTaskCard = (task) => {

			    let card = document.createElement('div');
			    card.className = 'card shadow cursor-pointer';

			    let cardBody = document.createElement('div');
			    cardBody.className = 'card-body';

			    let title = document.createElement('h5');
			    title.innerText = task.name;
			    title.className = 'card-title';

			    let color = document.createElement('div');
			    color.innerText = task.premium;
			    color.className = 'card-color';


			    cardBody.appendChild(title);
			    cardBody.appendChild(color);
			    card.appendChild(cardBody);
			    cardContainer.appendChild(card);

			}

			let initListOfTasks = () => {
			    
			};

			initListOfTasks();
		</script>

		<script>
			function findHealthPlans(geography) {
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
					    offset: 0,
					    order: "asc"
					}));
				 request.onload = function() {
				 	const values = request.response;
				 	console.log(values);
				 	console.log(values.plans[0].name);

				 	if (cardContainer) {
				        document.getElementById('card-container').replaceWith(cardContainer);
				        return;
				    }

				    cardContainer = document.getElementById('card-container');
				    values.plans.forEach((task) => {
				        createTaskCard(task);
				    });
				 }
			}
		</script>
	</body>
</html>