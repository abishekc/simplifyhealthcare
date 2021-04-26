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
					          gender: findGetParameter("gender"),
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
	let card = document.createElement('div');
	card.className = 'card cursor-pointer';

	let cardBody = document.createElement('div');
	cardBody.className = 'card-body';

	let title = document.createElement('h4');
	title.innerText = task.name;
	title.className = 'card-title';

	let prem_title = document.createElement('h6');
	prem_title.innerText = 'PREMIUM';
	let premium = document.createElement('div');
    premium.innerText = task.premium;
    prem_title.className = 'inner_heading';
    premium.className = 'amount';


    let break_el = document.createElement('br');

	let link_title = document.createElement("a");
    link_title.innerText = 'Full Benefits';
    link_title.href = task.benefits_url;
    link_title.className = "benefits_link";


    let ded_title = document.createElement('h6');
	ded_title.innerText = 'DEDUCTIBLE';
    let deductible = document.createElement('div');
    deductible.innerText = (task.deductibles[0].amount);
    ded_title.className = 'inner_heading';
    deductible.className = 'amount';


    


    cardBody.appendChild(title);

    if (task.hsa_eligible == true) {
    	let hsa_title = document.createElement('h5');
    	hsa_title.innerText = "HSA PLAN";
    	cardBody.appendChild(hsa_title);
    }

    cardBody.appendChild(prem_title);
    cardBody.appendChild(premium);

    cardBody.appendChild(ded_title);
    cardBody.appendChild(deductible);

    cardBody.appendChild(break_el);
    cardBody.appendChild(link_title);


    card.appendChild(cardBody);
    cardContainer.appendChild(card);
}


async function loadCards() {
	healthArray = await getHealthArray();
    healthArray.forEach((task) => {
    	if (task.metal_level == "Bronze") {
    		cardContainer = document.getElementById('bronze');
    		console.log("task");
    		createTaskCard(task);
    	} else if (task.metal_level == "Silver") {
    		cardContainer = document.getElementById('silver');
    		console.log("task");
    		createTaskCard(task);
    	} else if (task.metal_level == "Gold") {
    		cardContainer = document.getElementById('gold');
    		console.log("task");
    		createTaskCard(task);
    	} else if (task.metal_level == "Platinum") {
    		cardContainer = document.getElementById('platinum');
    		console.log("task");
    		createTaskCard(task);
    	}
	});
}

loadCards();