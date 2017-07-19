

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
		<div id="startHint" class="popover fade top in" role="tooltip" style="display:none; top: -140%;left: 10px;/* min-height: 70px; */"><div class="arrow" style="left: 30%;"></div><h3 class="popover-title" style="display: none;"></h3><div class="popover-content">Нажмите Пуск,<br> чтобы посмотреть работы</div></div>
			<div class="dropup">

				<button onclick="startHintHide()" class="dropdown-toggle box_3px" type="button" data-toggle="dropdown"> Start</button>
				<?php include "data/startmenu.php" ?>
		    </div> 
		    <div id="systray">
		    	<div class="clock"><p id="clock"></p></div>
		    	<div class="lang"><a href="#">Ru</a></div>
		    </div>
		</nav>
	</main>
<script>

var startHintToggler = 0;
var lastarticle = 0;
var lastaside = 0;

// # Main menu engine function #

var articleToggler = (function () {
    // var lastarticle = 0;
    // var lastaside = 0;
   	return function (item) {
        var articleid = "#"+document.getElementById("article"+item.id).id;     
   		if (lastarticle != 0 && lastarticle != articleid) {$(lastarticle).collapse('hide');};  
        $(articleid).collapse('toggle');     
        lastarticle = articleid;

        var asideid = "#"+document.getElementById("aside"+item.id).id;
		if (lastaside != 0 && lastaside != asideid) {$(lastaside).collapse('hide');};    	
		$(asideid).collapse('toggle');
		lastaside = asideid;	}
       }
     )();

// # X Button engine #
var exitTogglerArticle = function() {
			$(lastarticle).collapse('toggle');
			$(lastaside).collapse('toggle');
			}
var exitTogglerAside = function() {
			$(lastarticle).collapse('toggle');
			$(lastaside).collapse('toggle');
			}

// # STARTMENU HINT #
$(document).ready( function() {
setTimeout( function () { 
	if (!startHintToggler) { document.getElementById("startHint").style.display = "block";} 
	}, 3000);
});

function startHintHide() {
	document.getElementById("startHint").style.display = "none";
	startHintToggler = 1;
}


// # TRAY CLOCK #

$(document).ready(function () {
        startTime(); });
function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        var hd = h;
        $('#clock').html((hd = 0 ? "12" : hd > 12 ? hd - 12 : hd) + ":" + m + " " + (h < 12 ? "AM" : "PM"));
        t = setTimeout(function () { startTime() }, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
</script>
</body>
</html>

