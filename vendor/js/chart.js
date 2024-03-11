$(function () {

	// Call ajax to catch data form database 
	var ajax = new XMLHttpRequest();
	var method = 'GET';
	var url = '/controllers/diagram/diagram.controller.php';
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

		// lineCart
		var ctx = document.getElementById("lineChart");
		var lineChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May"],
				datasets: [{
					label: 'Developer',
					data: [20, 10, 5, 5, 20],
					fill: false,
					borderColor: '#373651',
					backgroundColor: '#373651',
					borderWidth: 1
				},
				{
					label: 'Marketing',
					data: [2, 2, 3, 4, 1],
					fill: false,
					borderColor: '#E65A26',
					backgroundColor: '#E65A26',
					borderWidth: 1
				},
				{
					label: 'Marketing',
					data: [1, 3, 6, 8, 10],
					fill: false,
					borderColor: '#a1a1a1',
					backgroundColor: '#a1a1a1',
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
});

