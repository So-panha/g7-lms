$(function () {

	// Call ajax to catch data form database 
	var ajax = new XMLHttpRequest();
	var method = 'GET';
	var url = '/controllers/diagram/diagram.position.controller.php';
	var asynchronous = true;

	ajax.open(method, url, asynchronous)
	// send ajax
	ajax.send();
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			// converting JSON back to array
			var data = JSON.parse(this.responseText);
			// variable for diagram positions
			const nameOfPosition = [];
			const numberOfPosition = [];
			// numberOfPosition[0] = data[0][0];

			for (var i = 0; i < data.length; i++) {
				nameOfPosition[i] = data[i].position_name;
				numberOfPosition[i] = data[i].number_positions;
			}
			// Pie Chart
			var ctx = document.getElementById('pieChart');
			var pieChart = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: nameOfPosition,
					datasets: [{
						label: '# of Votes',
						data: numberOfPosition,
						backgroundColor: [
							'rgba(255, 99, 132, 1)',
							'#3E007C',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)'
						],
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					legend: {
						display: false
					}
				}
			});
		}
	}


	// Call ajax to catch data form database 
	var ajax = new XMLHttpRequest();
	var method = 'GET';
	var url = '/controllers/diagram/diagram.leave.controller.php';
	var asynchronous = true;

	ajax.open(method, url, asynchronous)
	// send ajax
	ajax.send();
	ajax.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {

			// converting JSON back to array
			var data = JSON.parse(this.responseText);

			// variable for diagram months
			const leaveAllMouths = [];

			// Months of the year
			var Jan = 0;
			var Feb = 0;
			var Mar = 0;
			var Apr = 0;
			var May = 0;
			var Jun = 0;
			var July = 0;
			var Aug = 0;
			var Sep = 0;
			var Oct = 0;
			var Nov = 0;
			var Dec = 0;

			// Set of data into each month
			for (var i = 0; i < data.length; i++) {
				
				// Set and Get date of the data
				let today = new Date();
				let date = data[i].start_leave;
				let yearNow = today.getFullYear();
				let yearLeave = date.slice(6, date.length);
				let mouth = date.slice(date.search('/') + 1, 5);
				let permission = data[i].checked;

				if (yearLeave == yearNow && permission == 'Approved') {

					if (mouth == '01') {
						Jan += 1;
					} else if (mouth == '02') {
						Feb += 1;
					} else if (mouth == '03') {
						Mar += 1;
					} else if (mouth == '04') {
						Apr += 1;
					} else if (mouth == '05') {
						May += 1;
					} else if (mouth == '06') {
						Jun += 1;
					} else if (mouth == '07') {
						July += 1;
					} else if (mouth == '08') {
						Aug += 1;
					} else if (mouth == '09') {
						Sep += 1;
					} else if (mouth == '10') {
						Oct += 1;
					} else if (mouth == '11') {
						Nov += 1;
					} else {
						Dec += 1;
					}

				}

			}

			// Set each month in to array of months
			leaveAllMouths[0] = Jan;
			leaveAllMouths[1] = Feb;
			leaveAllMouths[2] = Mar;
			leaveAllMouths[3] = Apr;
			leaveAllMouths[4] = May;
			leaveAllMouths[5] = Jun;
			leaveAllMouths[6] = July;
			leaveAllMouths[7] = Aug;
			leaveAllMouths[8] = Sep;
			leaveAllMouths[9] = Oct;
			leaveAllMouths[10] = Nov;
			leaveAllMouths[11] = Dec;

			// lineCart
			var ctx = document.getElementById("lineChart");
			const barColors = ["red", "green", "blue", "orange", "brown", "purple", "yellow", "light-blue", "gray", "blown", "light-green", "golden", ""];
			var lineChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: 'Leave total',
						data: leaveAllMouths,
						fill: false,
						borderColor: '#373651',
						backgroundColor: barColors,
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					legend: {
						display: false
					}
				}
			});

		}
	}

});

