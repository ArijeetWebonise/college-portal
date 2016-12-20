$( function() {
  availableTags=[];
    $( "#search" ).autocomplete({      source: "/view/admin/searchresult.php"	});
  } );
