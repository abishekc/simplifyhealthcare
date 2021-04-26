let API_BASE_URL = "https://marketplace.api.healthcare.gov/api/v1"

document.getElementById("location").innerText = findGetParameter("zipcode");
document.getElementById("age").innerText = findGetParameter("age");
document.getElementById("income").innerText = findGetParameter("income");

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

async function getTotalPlans() {
	const geography = await sendGeographyRequest();
	const returnValues = await sendPlanRequest(geography, 0);
	console.log("/s: GET TOTAL PLANS RETRUNED;")
	console.log(returnValues.total);

	return returnValues.total;
}

async function getHealthArray() {
	const totalPlans = await getTotalPlans();
	const geography = await sendGeographyRequest();
	let healthArray = [];
	for(i = 0; i < totalPlans; i += 10) {
		const returnValues = await sendPlanRequest(geography, i);
		healthArray.push.apply(healthArray, returnValues.plans);
	}
	console.log(healthArray);

	return healthArray
}

function sendGeographyRequest() {
	return new Promise(function (resolve) {
		let API_ZIP_URL = "/counties/by/zip/"
		let zipcode = findGetParameter("zipcode");
		let apikey = "?apikey=d687412e7b53146b2631dc01974ad0a4";
		let countyRequest = API_BASE_URL.concat(API_ZIP_URL, zipcode, apikey);

		let request = new XMLHttpRequest();
		request.open('GET', countyRequest);
		request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
		request.responseType = 'json';
		request.send();

		request.onload = function() {
			const values = request.response;

			// PRINT CURRENT COUNTY AND FIPS CODE
			console.log("/s: GET COUNTY & FIPS RETURNED;")
			console.log(values);
			console.log(values.counties[0].fips);
			resolve(values.counties);
		}
	});

}

function sendPlanRequest(geography, offset) {
	return new Promise(function (resolve) {
		let API_PLANS_URL = "/plans/search?apikey=d687412e7b53146b2631dc01974ad0a4";
		let plansRequest = API_BASE_URL.concat(API_PLANS_URL);
		
		let request = new XMLHttpRequest();
		request.open('POST', plansRequest);
		request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
		request.responseType = 'json';
		request.send(
				 	JSON.stringify({
					    household: {
					      people: [
					        {
					          age: parseInt(findGetParameter("age")),
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
					    offset: offset,
					    order: "asc"
					}));

		request.onload = function() {
			const values = request.response;
			resolve(values);
		}
	});
}

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


async function loadCards() {
	healthArray = await getHealthArray();
	cardContainer = document.getElementById('card-container');
    healthArray.forEach((task) => {
    		console.log("task");
    		createTaskCard(task);
	});
}

loadCards();