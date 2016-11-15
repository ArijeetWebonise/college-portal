<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="css/style2.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="http://malsup.github.io/min/jquery.cycle2.min.js"></script>
</head>
<body>
	<div id="outside">
	<img class="backimg" src="https://s-media-cache-ak0.pinimg.com/originals/63/6d/5c/636d5c0b279f5735a66df8163bd86d7b.jpg">
		<!-- slideshow -->
		<div class="cycle-slideshow" 
		data-cycle-fx=scrollHorz
		data-cycle-timeout=0
		data-cycle-prev="#prev"
		data-cycle-next="#next"
		data-cycle-slides="> div"
		>
			<div>
				<ul class="viewlist">
					<li><a href="attendence.php"><img src="image/attendence.png"><span>attendence</span></a></li>
					<li><a href="timetableview.php"><img src="image/timetable.png"><span>timetable</span></a></li>
				</ul>
			</div>
			<div>2</div>
			<div>3</div>
			<div>4</div>
		</div>
		<!-- prev/next links -->
		<div class=slidercontrol>
			<span id=prev>&lt;&lt;Prev </span>
			<span id=next> Next&gt;&gt;</span>
		</div>
	</div>
</body>
</html>