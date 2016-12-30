$( function() {
  availableTags=[];
    $( "#search" ).autocomplete({      
    	source: "/view/admin/searchresult.php",
    	focus: function( event, ui ) {
			$( "#search" ).val( ui.item.label );
			console.log(ui);
			return false;
		},
		response: function( event, ui ) {
			console.log(ui);
		},
		select: function( event, ui ) {
			$( "#search" ).val( ui.item.value );
			return false;
		}
	});
});
