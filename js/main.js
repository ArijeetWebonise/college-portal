$( function() {
	$( "#sortable" ).sortable({
		beforeStop: function(ev, ui) {
            if ($(ui.item).hasClass('hasItems') && $(ui.placeholder).parent()[0] != this) {
                $(this).sortable('cancel');
            }
        },
		update: function(event, ui) {
			var productOrder = $(this).sortable('toArray').toString();
			var list=productOrder.split(",");
			$.ajax({
				url: "editmenuserver", 	
				method : "POST",
				data:{"list":JSON.stringify(list),"sub":"FALSE"}
			}).done(function(result) {

			});
		}
	});
	$('ul.sublist').sortable({
		update: function(event, ui) {
			var productOrder = $(this).sortable('toArray').toString();
			var list=productOrder.split(",");
			$.ajax({
				url: "editmenuserver", 	
				method : "POST",
				data:{"list":JSON.stringify(list),"sub":"TRUE"}
			}).done(function(result) {

			});
		}
	});
	$( "#sortable" ).disableSelection();
	$('ul.sublist').disableSelection();
} );
