<?php
mysql_connect('localhost','spaceg','lolita1122');
mysql_select_db('spaceg');

$sql='SELECT coord_x,coord_y FROM  xgp_planets WHERE planet = 0 ORDER by coord_x';
$result = mysql_query($sql) or die(mysql_error());
$i = 0;
while($data = mysql_fetch_array($result)){
	
	$arrayResult[$i]['x'] = str_replace('000','',$data['coord_x'])*5;
	$arrayResult[$i]['y'] = str_replace('000','',$data['coord_y'])*5;
	//echo '<div style="position:absolute;top:'.$arrayResult[$i]['y'].'; left:'.$arrayResult[$i]['x'].'">A</div>';
	$i++;
}
$result = json_encode($arrayResult);
//$arrayMy[0] =  array('x'=>,'y'=>'');
//$arrayMy[1] =  array('x'=>'','y'=>'');
//$arrayMy[2] =  array('x'=>'','y'=>'');
//$arrayMy[3] =  array('x'=>'','y'=>'');
?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="js/jquery.overscroll.min.js"></script>
<script>
jQuery(document).ready(function($){
     var canvas = document.getElementById("canvas");
	 var doc = document.getElementById('carto');
	 doc.addEventListener("mousemove", function(e) {
                    console.log(e.pageX, e.pageY); 
						$('#vertical').css('left',e.pageX+3);
						$('#vertical').css('height',$('#canvas').height());
						$('#horizontal').css('top',e.pageY-3);
                    });
	$('.colo').bind('click',function(){
		event.preventDefault();
	});
 var ctx = canvas.getContext("2d");
	var data = eval(<?=$result;?>);
		var image_etoile = new Image();
		image_etoile.src = "styles/images/carte/etoile.png";
		image_etoile.onload = function(){
			for(i=0,j=data.length;i<j;i++){
				console.log(data[i].x);
				ctx.drawImage(image_etoile, data[i].x, data[i].y);
			}
		}
	//C'est ici que l'on placera tout le code servant à nos dessins.
	$(document).bind('onmousemove',function(e){
		console.log(e);
	});
	$("#carto").overscroll();
});
function CarteClickDown(event){
	console.log(event);
}
function carteMouse(event){
	console.log(event);
}
</script>

</head>
<body id="carto" style="background-color:black";>


<div id="vertical" style="height:100%;border:1px solid white;position:absolute;z-index:9000"></div>
<div id="horizontal" style="width:100%;border:1px solid white;position:absolute;z-index:9000"></div>

<div id="carte" style="position: relative;"
>
        <canvas id="canvas" width="1035" height="1035" style="background-color:black;" onclick="CarteClickDown(event)">
            Message pour les navigateurs ne supportant pas encore canvas.
        </canvas>

<?php
$sql='SELECT coord_x,coord_y FROM  xgp_planets WHERE id_owner = 1';
//echo $sql;
$result = mysql_query($sql) or die(mysql_error());
$i = 0;
$datatemp = array();

while($dataMy = mysql_fetch_array($result)){
	//echo (str_replace(substr ( $dataMy['coord_x'],-3),'',$dataMy['coord_x'])*3).' | '.(str_replace(substr ( $dataMy['coord_y'],-3),'',$dataMy['coord_y'])*3).'<br />';
	$arrayMy[$i]['x'] = (str_replace(substr ( $dataMy['coord_x'],-3),'',$dataMy['coord_x'])*5);
	$arrayMy[$i]['y'] = (str_replace(substr ( $dataMy['coord_y'],-3),'',$dataMy['coord_y'])*5);	
	// print_r($dataMy);
	if (!in_array($arrayMy[$i]['x'].$arrayMy[$i]['y'],$datatemp)){
		echo '<div class="colo" style="position:absolute;top:'.$arrayMy[$i]['y'].';left:'.$arrayMy[$i]['x'].'"><a href="#"><img src="styles/images/secteur.png" /></a></div>';
		$datatemp[] = $arrayMy[$i]['x'].$arrayMy[$i]['y'];
	}
	$i++;
}
?>
</div>
</body>
</html>