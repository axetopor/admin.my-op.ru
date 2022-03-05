<head>
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="/fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script>


jQuery(document).ready(function() {
	$("a[rel=example_group]").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'titlePosition' 	: 'top',
		'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
		    return '<span id="fancybox-title-over" style="color:white;">Изображение ' +  (currentIndex + 1) + ' из ' + currentArray.length + ' ' + title + '</span>';
		}
	});
});
</script>
<style>
#fancybox-title-over {
    !background-image: url(1.png);
}
</style>
</head>

<?php

include 'config.php';
include 'functions.php';


$album_id = "-7";
@$album_id = $_GET['aid'];
$albums_count ='0';
$ver = "5.69";
$user_id = "285963249";
$token = "0a6c5b8dbd4136d66457e3dc8c731a6e1af5217a556d0b35e98e2941aa481627684ca9f85798075601be5";
// photos.getAlbums($owner_id, $token, $iferr);

//AlbumsGet($user_id, $token, $iferr);







// for ($q=1; $q < $albums_count; $q++){ 
	// echo "<a href=album.php?aid=".$param[$q]['aid'].">".$param[$q]['aid']." | ".$param[$q]['title']."</a><br>";
// }
	




$json = file_get_contents('https://api.vk.com/method/photos.getAll?v='.$ver.'&owner_id='.$user_id.'&access_token='. $token .'' );
$photos_arr = json_decode($json);

$photos = $photos_arr->{'response'};
$count = $photos->{'count'};
$items = $photos->{'items'};

 // var_dump($photos->{'count'});
 // var_dump($photos->{'items'});
	// echo $count;
	// echo $items;
	
// print_r ($photos[0]);
// print_r ($photo->{'width'});
// echo $photos[2]->{'width'};

$img = Array();
$link = array();
	$img = array();
	$img_130 = array();
	$img_604 = array();
for ($i = 0; $i < $count; $i++){
 	
	$ii = $i + 1;
	
		$id = $items[$i]->{'id'};
		$id_i[$id] = $i;
		$album_id[$id] = $items[$i]->{'album_id'};
		$owner_id[$id] = $items[$i]->{'owner_id'};
		

		if (isset($items[$i]->{'photo_75'})){ $photo_75[$id] = $items[$i]->{'photo_75'};}
		if (isset($items[$i]->{'photo_130'})){ $photo_130[$id] = $items[$i]->{'photo_130'};}
		if (isset($items[$i]->{'photo_604'})){ $photo_604[$id] = $items[$i]->{'photo_604'};}
		if (isset($items[$i]->{'photo_807'})){ $photo_807[$id] = $items[$i]->{'photo_807'};}
		if (isset($items[$i]->{'photo_1280'})){ $photo_1280[$id] = $items[$i]->{'photo_1280'};}
		if (isset($items[$i]->{'photo_2560'})){	$photo_2560[$id] = $items[$i]->{'photo_2560'};}
		
		if (isset($items[$i]->{'width'})){ $width[$id] = $items[$i]->{'width'}; $width_i[$i] = $width[$id];}
		if (isset($items[$i]->{'height'})){ $height[$id] = $items[$i]->{'height'}; $height_i[$i] = $height[$id];}
		if (isset($items[$i]->{'text'})){ $text[$id] = $items[$i]->{'text'};}			
		if (isset($items[$i]->{'date'})){ $date[$id] = $items[$i]->{'date'};}
		if (isset($items[$i]->{'post_id'})){ $post_id[$id] = $items[$i]->{'post_id'};}
	


array_push($img_130, $photo_130[$id]);
array_push($img_604, $photo_604[$id]);


		echo "
	<div class='thumbnail center' style='width:250px;'>
		"; 

echo "
	<div style=''><div style='position:absolute;'>
		<details style='background-color:REBECCAPURPLE; position:absolute; left:10px; top:10px; width:max-content;'><pre>";
	echo "<table class='table small' style='width: 600px;'>";
	echo "<tr class='table active '><td>№: </td><td>".$ii."</td></tr>";
	echo "<tr class='table'><td><span class='text-primary'>id: </span></td><td>".$id."</td></tr>";
	echo "<tr class='table active'><td><span class='text-primary'>album_id: </span></td><td>".@$album_id[$id]."</td></tr>";
	echo "<tr class='table'><td><span class='text-primary'>owner_id: </span></td><td>".@$owner_id[$id]."</td></tr>";
	echo "<tr class='table active'><td><span class='text-primary'>photo_2560: &nbsp;</span></td><td>".@$photo_2560[$id]."</td></tr>";
	echo "<tr class='table'><td><span class='text-primary'>photo_1280: &nbsp;</span></td><td>".@$photo_1280[$id]."</td></tr>";
	echo "<tr class='table active'><td><span class='text-primary'>width: &nbsp;</span></td><td>".@$width[$id]."</td></tr>";
	echo "<tr class='table'><td><span class='text-primary'>height: &nbsp;</span></td><td>".@$height[$id]."</td></tr>";
	echo "<tr class='table active'><td><span class='text-primary'>text: </span></td><td>".@$text[$id]."</td></tr>";
	echo "<tr class='table'><td><span class='text-primary'>date: </span></td><td>".@$date[$id]."</td></tr>";
	echo "<tr class='table active'><td><span class='text-primary'>post_id: </span></td><td>".@$post_id[$id]."</td></tr>";
	echo "<tr class='table'><td><span class='text-primary'>хуй</span></td><td>";
	echo "</table>";
echo '</pre></details></div></div>';
echo "<a rel='example_group' target='_blank' href='$photo_604[$id]'>
			<img class='' src='$photo_604[$id]' alt='' width='400px'/>
		</a>
";
echo '	</div>

	';
		}

	print_r ($img_130);


// $widthdef=640; //ширина блока изображений
// $heightdef=100; //максимальна¤ высота одной строки
// $margin=1; //отступы между картинками
// // echo $img[pid];

// echo var_dump($img);
// $imagescount = $count; //соответсвенно, количество картинок


echo "
	<div style='position:absolute; right:10px; top:10px; '>
		<details style='background-color: REBECCAPURPLE;'>
			<pre>
			";
			echo "[";
			var_dump($photos_arr->{'response'}->{'items'});
			// var_dump($photos_arr);
echo '</pre></details></div>';








?>