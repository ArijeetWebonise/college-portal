$( function() {
	$( "#sortable" ).sortable({
		update: function(event, ui) {
			var productOrder = $(this).sortable('toArray').toString();
			var list=productOrder.split(",");
			$.ajax({
				url: "editmenuserver", 	
				method : "POST",
				data:{"list":JSON.stringify(list)}
			}).done(function(result) {
				console.log(JSON.parse(result));
			});
		}
	});
	$( "#sortable" ).disableSelection();
} );
