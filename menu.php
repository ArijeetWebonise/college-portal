<?php
	function menurender()
	{
		?>
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
		<script type="text/javascript" src="../../js/search.js"></script>
 <nav>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bharthi</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><form class="searchbox"><span class="glyphicon glyphicon-search"></span>
      <input type="search" placeholder="Search......" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
        <input type="submit" class="searchbox-submit" value="GO">
    </form></a></li>
    </ul>
  </div>
</nav>
		<?php
	}
?>
