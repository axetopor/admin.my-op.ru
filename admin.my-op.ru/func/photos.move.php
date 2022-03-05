<?php
//https://api.vk.com/method/photos.move
//?owner_id=105253591
//&target_album_id=249319055
//&access_token=
//&photo_id=456239584
	
	//$owner_id = $_GET['owner_id'];
	$owner_id = "105253591";
		echo 'owner_id: '.$owner_id.'<br>';
	
	//$target_album_id = $_GET['target_album_id'];
	$target_album_id = "249319055";
		echo 'target_album_id: '.$target_album_id.'<br>';
	
	//$access_token = $_GET['access_token'];
	$access_token = "0a6c5b8dbd4136d66457e3dc8c731a6e1af5217a556d0b35e98e2941aa481627684ca9f85798075601be5";
		echo 'access_token: '.$access_token.'<br>';
	
	$photo_id = $_GET['photo_id'];
	//$photo_id = "";
		echo 'photo_id: '.$photo_id.'<br>';
// http://admin.my-op.ru/func/photos.move.php
// ?owner_id=105253591
// &photo_id=412521617
// &target_album_id=249319055
// &access_token=0a6c5b8dbd4136d66457e3dc8c731a6e1af5217a556d0b35e98e2941aa481627684ca9f85798075601be5
// &v=5.69

	$json = file_get_contents('https://api.vk.com/method/photos.move?owner_id='.$owner_id.'&target_album_id='.$target_album_id.'&access_token='.$access_token.'&v=5.69');
	$arr = json_decode($json);
	var_dump($arr);
	@$response = $arr->{'response'};



?>