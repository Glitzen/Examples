

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
	<main>
		<section>
		<?php include "data/articles.php" ?>
		</section>
		<nav>
			<div class="dropup">
				<button class="dropdown-toggle" type="button" data-toggle="dropdown"> Start</button>
				<?php include "data/startmenu.php" ?>
		    </div> 
		</nav>
	</main>
<script>
var articleToggler = (function () {
    var lastarticle = 0;
    var lastaside = 0;
   	return function (item) {
        var articleid = "#"+document.getElementById("article"+item.id).id;     
   		if (lastarticle != 0 && lastarticle != articleid) {$(lastarticle).collapse('hide');};  
        $(articleid).collapse('toggle');     
        lastarticle = articleid;

        var asideid = "#"+document.getElementById("aside"+item.id).id;
		if (lastaside != 0 && lastaside != asideid) {$(lastaside).collapse('hide');};    	
		$(asideid).collapse('toggle');
		lastaside = asideid;}
       }
     )();
</script>
</body>
</html>