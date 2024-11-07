let garden = document.getElementById('garden');
if (garden != null){
	// Map page JavaScript
	
	let fruit_progress = document.getElementById('fruit_progress');
	let tree_progress = document.getElementById('tree_progress');
	let chicken_progress = document.getElementById('chicken_progress');
	let waste_type = document.getElementById('waste_type');
	let donatePopup = document.getElementsByClassName('open-donate-popup');
	
	var popup = document.getElementById("popup");
	var showmap = document.getElementById("map");
	var buttonCount =0;
	
	function openPopup(data) {
		popup.classList.add("open-popup");
		document.cookie = "wasteType=" + data;
		console.log(document.cookie + "openpop");
		console.log(data);
		if ( data == 'fruit'){
			console.log("fruit");
			waste_type.innerHTML = "Fruit & Veggies";
		} else if ( data == 'tree'){
			console.log("tree");
			waste_type.innerHTML = "Coffee grounds";
		} else if ( data == 'chicken'){
			console.log("chicken");
			waste_type.innerHTML = "Eggshells & Teabags";
		}
	}
	
	function openDonatePopup() {
		console.log("fruit");
		donatePopup.classList.add("open-donate-popup");
	}

	function closeDonatePopup() {
		donatePopup.classList.add("completecontainer");
		donatePopup.classList.remove("open-donate-popup");
	}

	function closePopup() {
		popup.classList.remove("open-popup");
	}

	
	function openMap() {
		showmap.classList.add("open-map");
		
	}
	
	function closeMap() {
		showmap.classList.remove("open-map");
	}
	
	
	function chooseGarden(data){
		// Close the map 
		let garden_id = document.getElementById(data);
		console.log(garden_id.value);
		let gardenBtn = document.getElementById("choose_garden_btn");
		console.log(gardenBtn);
		gardenBtn.innerHTML = garden_id.value;
		// document.cookie = 'gardenName='+chooseGarden;
		closeMap()
	}
	
	function doContribute(){
		console.log("Hi");
		closePopup()
	}
	var myMap = L.map("map").setView([-27.5, 153], 12); // setView([coordinate, map size])
	
	function compostingRecord(results) {
	
		console.log(results);
	
		// Setup the map as per the Leaflet instructions:
	
		// https://leafletjs.com/examples/quick-start/
		L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
		maxZoom: 50, attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(myMap);
	
	
		// Iterate over each record and add a marker using the Latitude field (also containing longitude)
		$.each(results.result.records, function(recordID, recordValue) {
			console.log("total");
			if (recordValue["Latitude"] != null){
				console.log("dfjsdkjfsdf");
				var recordLatitude = recordValue["Latitude"];
				var gardenName = recordValue["Garden_Name"];
				var recordLongitude = recordValue["Longitude"];
				var recordAddress = recordValue["Address"];
				var recordFacilities = recordValue["Facilities"];
				var recordPhone = recordValue["Phone"];
				var recordWebsite = recordValue["Website"];
				var recordOpeningTimes = recordValue["Opening_times"];
				var recordOtherInfo = recordValue["Other_information"];
		
				// Markers
				var marker = L.marker([recordLatitude, recordLongitude]).addTo(myMap);
		
				// Pop up msg
				//var popup = L.popup().setLatLng([51.513, -0.09]).setContent("I am a standalone popup.").openOn(myMap);
				marker.bindPopup("<br><h1>" + gardenName + "</h1>" 
				+ "<br><b>Address: </b><br>" + recordAddress 
				+ "<br><b>Facilities: </b><br>" + recordFacilities
				+ "<br><b>Opening times: </b>" + recordOpeningTimes 
				+ "<br><b>Website: </b><br><a href='" + recordWebsite + "'>" + recordWebsite + "</a>"
				+ "<br><b>Contact: </b><br>" + recordPhone
				+ "<br><b>Other information: </b><br>" + recordOtherInfo     
				+ "<br><b>Location: </b> [ " + recordLatitude + ", " + recordLongitude + " ]"
				+ "<br><b><button class='changeBtn' onclick=\"chooseGarden(" + buttonCount + ")\" id=" + buttonCount  + " \" value=" + gardenName + "> Choose this Hub </button>"
				).openPopup();
				buttonCount = buttonCount + 1;
				// Circles
				var circle = L.circle([recordLatitude, recordLongitude], {
					color: 'red',
					fillColor: '#f03',
					fillOpacity: 0.5,
					radius: 500
				}).addTo(myMap);
			} else if(recordValue["latitude"] != null){
				console.log("hi");
				var recordLatitude = recordValue["latitude"];
				var gardenName = recordValue["name"];
				var recordLongitude = recordValue["longitude"];
				var recordAddress = recordValue["location"];
				// var recordFacilities = recordValue["Facilities"];
				// var recordPhone = recordValue["Phone"];
				// var recordWebsite = recordValue["Website"];
				// var recordOpeningTimes = recordValue["Opening_times"];
				// var recordOtherInfo = recordValue["Other_information"];
		
				// Markers
				var marker = L.marker([recordLatitude, recordLongitude]).addTo(myMap);
		
				// Pop up msg
				//var popup = L.popup().setLatLng([51.513, -0.09]).setContent("I am a standalone popup.").openOn(myMap);
				marker.bindPopup("<br><h1>" + gardenName + "</h1>" 
				+ "<br><b>Address: </b><br>" + recordAddress  
				+ "<br><b>Location: </b> [ " + recordLatitude + ", " + recordLongitude + " ]"
				+ "<br><b><button class='changeBtn' onclick=\"chooseGarden(" + buttonCount + ")\" id=" + buttonCount  + " \" value=" + gardenName + "> Choose this Hub </button>"
				).openPopup();
				buttonCount = buttonCount + 1;
				// Circles
				var circle = L.circle([recordLatitude, recordLongitude], {
					color: 'red',
					fillColor: '#f03',
					fillOpacity: 0.5,
					radius: 500
				}).addTo(myMap);
			}
			
		});
	
	}
	

	



	// function communityRecord(results) {
	
	// 	console.log(results);
	
	// 	// Setup the map as per the Leaflet instructions:
	
	// 	var myMap2 = L.map("map2").setView([-27.5, 153], 12); // setView([coordinate, map size])
	// 	// https://leafletjs.com/examples/quick-start/
	// 	L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
	// 	maxZoom: 50, attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	// 	}).addTo(myMap2);
	
	
	// 	// Iterate over each record and add a marker using the Latitude field (also containing longitude)
	// 	$.each(results.result.records, function(recordID, recordValue) {
	
	// 		var recordLatitude = recordValue["latitude"];
	// 		var gardenName = recordValue["name"];
	// 		var recordLongitude = recordValue["longitude"];
	// 		var recordAddress = recordValue["location"];
	// 		// var recordFacilities = recordValue["Facilities"];
	// 		// var recordPhone = recordValue["Phone"];
	// 		// var recordWebsite = recordValue["Website"];
	// 		// var recordOpeningTimes = recordValue["Opening_times"];
	// 		// var recordOtherInfo = recordValue["Other_information"];
	
	// 		// Markers
	// 		var marker = L.marker([recordLatitude, recordLongitude]).addTo(myMap2);
	
	// 		// Pop up msg
	// 		//var popup = L.popup().setLatLng([51.513, -0.09]).setContent("I am a standalone popup.").openOn(myMap2);
	// 		marker.bindPopup("<br><h1>" + gardenName + "</h1>" 
	// 		+ "<br><b>Address: </b><br>" + recordAddress  
	// 		+ "<br><b>Location: </b> [ " + recordLatitude + ", " + recordLongitude + " ]"
	// 		+ "<br><b><button class='changeBtn' onclick=\"chooseGarden(" + buttonCount + ")\" id=" + buttonCount  + " \" value=" + gardenName + "> Choose this Hub </button>"
	// 		).openPopup();
	// 		buttonCount = buttonCount + 1;
	// 		// Circles
	// 		var circle = L.circle([recordLatitude, recordLongitude], {
	// 			color: 'red',
	// 			fillColor: '#f03',
	// 			fillOpacity: 0.5,
	// 			radius: 500
	// 		}).addTo(myMap2);
			
	// 	});
	
	// }
	
	$(document).ready(function() {
	
		var data = {
			resource_id: "b71a3b80-1cd9-4242-924e-5d9e2a4a985f"
			//limit: 100
		}

		var data2 = {
			resource_id: "d1e45f88-5bd9-4c29-813d-f97fd3941fba"
			//limit: 100
		}
	
		$.ajax({
			url: "https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search",
			data: data,
			dataType: "jsonp",
			cache: true,
			success: function(res) {
				compostingRecord(res);				
			}
		});

		$.ajax({
			url: "https://www.data.brisbane.qld.gov.au/data/api/3/action/datastore_search",
			data: data2,
			dataType: "jsonp",
			cache: true,
			success: function(results) {
				compostingRecord(results);
			}
			
		});
		
	
	});
}	

