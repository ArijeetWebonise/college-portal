<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $site->getTitle(); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
</head>
<body>
<?php getnav(); ?>
	<div class="container">
		<h1><?php echo $event['event name'] ?></h1>
		<h5><?php echo $event['creator'] ?></h5>
		<div class="col-sm-7">
			<p><?php echo $event['event desp'] ?></p>
			<?php if($event['isVirtual']==FALSE){
				if($event['show Map']==FALSE){?>
			Location:<?php echo $event['location']; ?>
				<?php}else{
				?>
			<div id="map" style="width:100%;height:500px"></div>
				<?php
			}
				}else{
				?>
			URL:<?php echo $event['location']; ?>
				<?php
				} ?>
		</div>
		<div class="col-sm-5">
			<ul>
				<li>Start Date:<?php echo $event['start date']; ?></li>
				<li>End Date:<?php echo $event['end date']; ?></li>
				<li>End Date:<?php echo $event['start time']; ?></li>
				<li>End Date:<?php echo $event['end time']; ?></li>
			</ul>
		</div>
	</div>
	<script>
	function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

        geocodeAddress(geocoder, map);
      }

      function geocodeAddress(geocoder, resultsMap) {
        geocoder.geocode({'address': "<?php echo $event['location']; ?>"}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
</body>
</html>
