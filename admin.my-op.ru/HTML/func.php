<?php

function GetNews($owner_id,$album_id,$token){
	
	global $photo_604;
	
	$GetNews_json = file_get_contents('https://api.vk.com/method/photos.get?owner_id='.$owner_id.'&album_id='.$album_id.'&access_token='.$token.'&v=5.69');
	$GetNews_json_arr = json_decode($GetNews_json);
	//var_dump($GetNews_json_arr);
	$GetNews_response = $GetNews_json_arr->{'response'};
	
	$GetNews_count = $response->{'count'};
	$GetNews_items = $response->{'items'};

	
	for ($n = 0; $n < $GetNews_count; $n++) {

			$text[$n] = $GetPhotos_items[$n]->{'text'};
			$post[$f] = $GetNews_items[$f]->{'photo_50'};
			
	
		// foreach ($GetPhotos_items[$f] as $key=>$value) {
			// $GetPhotos[$f][$key] = $value;

		// }
	}
}




?>
