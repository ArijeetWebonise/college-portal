window.onload = function() {
	$.ajax({url: "test/testserver", success: function(result){
		// console.log(JSON.parse(result));
        var chart = new CanvasJS.Chart("chartContainer", {
			title: {
				text: "Line Chart"
			},
			axisX: {
				interval: 10
			},
			data: [{
				type: "line",
				dataPoints: JSON.parse(result)
			}]
		});
		chart.render();
    }});
}
