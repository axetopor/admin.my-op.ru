<?php
function ShowNews(){
	
	$autors_img = 'Автор';
	$theme = 'Заголовок';
	$text = 'ОПУС';
	$autors_name = 'Имя';
	$post_mounts = 'Ноября';
	$post_date = '03';
	$post_year = '2017';
	
	echo $autors_img;
	echo $theme;
	echo $text;
	echo $autors_name;
	echo $post_mounts;
	echo $post_date;
	echo $post_year;
	
	
	
	echo "<h3><img src='$autors_img' class='img-circle' alt='Cinque Terre' width='50' height='50'>$theme</h2>
		<h5><span class='glyphicon glyphicon-time'></span> $autors_name, $post_mounts $post_date, $post_year.</h5>
		<h5>";
	for ($t = 0; $t < $tags_count; $tags_count++){
		echo"<span class='label label-danger'>$tags[$t]</span>";
	}
	echo "</h5><br><p>$text</p>";		
}


function GetPhotos($owner_id,$album_id,$token){
//https://api.vk.com/method/photos.get
//?owner_id=105253591
//&album_id=-15
//&access_token=0a6c5b8dbd4136d66457e3dc8c731a6e1af5217a556d0b35e98e2941aa481627684ca9f85798075601be5
	global $GetPhotos;
	global $GetPhotos_items;
	global $GetPhotos_count;
	global $photo_50;
	global $photo_604;
	
	$GetPhotos_json = file_get_contents('https://api.vk.com/method/photos.get?owner_id='.$owner_id.'&album_id='.$album_id.'&access_token='.$token.'&v=5.69');
	$GetPhotos_arr = json_decode($GetPhotos_json);
	//var_dump($GetPhotosv_arr);
	$response = $GetPhotos_arr->{'response'};
	
	$GetPhotos_count = $response->{'count'};
	$GetPhotos_items = $response->{'items'};

	
	for ($f = 0; $f < $GetPhotos_count; $f++) {

			$photo_604[$f] = $GetPhotos_items[$f]->{'photo_604'};
			$photo_50[$f] = $GetPhotos_items[$f]->{'photo_50'};
			
	
		// foreach ($GetPhotos_items[$f] as $key=>$value) {
			// $GetPhotos[$f][$key] = $value;

		// }
	}
}
function AllPhotoGet($owner_id,$token){

	global $photo_items;
	global $photo_count;
	global $album_photo;
	//https://api.vk.com/method/photos.getAll
	//?owner_id=105253591
	//&v=5.69
	//&access_token=0a6c5b8dbd4136d66457e3dc8c731a6e1af5217a556d0b35e98e2941aa481627684ca9f85798075601be5
	
	$AllPhotoGet_json = file_get_contents('https://api.vk.com/method/photos.getAll?owner_id='.$owner_id.'&access_token='.$token.'&v=5.69');
	$AllPhoto_arr = json_decode($AllPhotoGet_json);
	//var_dump($AllPhoto_arr);
	$response = $AllPhoto_arr->{'response'};
	
	$photo_count = $response->{'count'};
	$photo_items = $response->{'items'};
	
	for ($p = 0; $p < $photo_count; $p++) {

		foreach ($photo_items[$p] as $key=>$value) {
			$album_photo[$key] = $value;
			// echo $key.": ".$value."<br>";
			echo $album_photo['src'];
		}
	}
}

function PhotoGet($owner_id,$album_id,$token){
	
	global $photo;
		// https://api.vk.com/method/photos.getById
		//? photos=105253591_456239624
		//& access_token=0a6c5b8dbd4136d66457e3dc8c731a6e1af5217a556d0b35e98e2941aa481627684ca9f85798075601be5


	// "response": [{
		// "pid": 456239624,
		// "aid": -15,
		// "owner_id": 105253591,
		// "src": "https:\/\/pp.userapi.com\/c840626\/v840626639\/1c1b4\/sRPdB2qbGGY.jpg",
		// "src_big": "https:\/\/pp.userapi.com\/c840626\/v840626639\/1c1b5\/pACzHvI1QBI.jpg",
		// "src_small": "https:\/\/pp.userapi.com\/c840626\/v840626639\/1c1b3\/do6_0VOBkAg.jpg",
		// "src_xbig": "https:\/\/pp.userapi.com\/c840626\/v840626639\/1c1b6\/fWOhPN8h_-o.jpg",
		// "src_xxbig": "https:\/\/pp.userapi.com\/c840626\/v840626639\/1c1b7\/hoNBps3EzJ0.jpg",
		// "width": 1280,
		// "height": 730,
		// "text": "",
		// "created": 1509129039
	// }]		
		
		
		$PhotoGet_json = file_get_contents('https://api.vk.com/method/photos.getById?photos='.$owner_id.'_'.$album_id.'&access_token='.$token.''.$captcha );
		$photo_info_arr = json_decode($PhotoGet_json);
		
			// $photo[]['title'] = NULL;
	$response = $photo_info_arr->{'response'};
	$photo_count = count($response);
	for ($i = 0; $i < $photo_count; $i++) {

		foreach ($response[$i] as $key=>$value) {
			$photo[$key] = $value;
			//echo $key.": ".$value."<br>";
			
			

		}
		//$album_title[$photo[$i]['aid']] = $photo[$i]['title'];		
		// echo "<hr>";
			// echo $photo[$i]['owner_id'];
			// echo "<br>";
			// echo $photo[$i]['src_xxbig'];
			// echo "<br>";
	}

}
function AlbumsGet($owner_id, $token, $iferr){
	
	@$captcha = '&captcha_sid='.$_GET ['captcha_sid'].'&captcha_key='.$_GET ['captcha_key'];
	// echo $captcha;
	
	global $param;
	global $albums_count;
	global $album_title;
	global $group_title;
	global $error;
	global $frends;

	
	// if $user_id = 
	$id = 'owner_id='.$owner_id.'&';

			 
				// if (($owner_id{0})<>"-"){
					// $id = 'owner_id=-'.$owner_id.'';
				// } else {
					// $id = 'owner_id='.$owner_id.'';
				// };

	
	
	
    
	// $json = file_get_contents('https://api.vk.com/method/photos.getAlbums?uid=-87562343&need_system=1&need_covers=1&access_token='.$token.''.$captcha );
	$json = file_get_contents('https://api.vk.com/method/photos.getAlbums?'.$id.'&need_covers=1&need_system=1&access_token='.$token.''.$captcha );
	$photos_arr = json_decode($json);
	

	@$error = $photos_arr->{'error'};
	
	
	
if(isset($error)) {
	
	$err = $error->{'error_code'};
	if ($err == 5){
		
		echo "
			Ошибка: [".$error->{'error_code'}."] <b>".$error->{'error_msg'}."</b> <br><br>
			<img src=".$error->{'captcha_img'}.">
			<form action='page.php?id=albums'>
			<p>
			<input type='text' hidden name='id' value='albums'><Br>
			<input type='text' hidden name='captcha_sid' value=".$error->{'captcha_sid'}."><Br>
			<input type='text' name='captcha_key' value=''><Br>
			</p>
			<p><input type='submit'></p>
			</form>";

	}
	
	if ($err == 3){
		
		$req_params = $error->{'request_params'};
		echo $error->{'error_msg'}." <br><pre>";
		print_r ($req_params);
		echo "</pre>";
	}
	
	if ($err == 5){
		
		$req_params = $error->{'request_params'};
		echo $error->{'error_msg'}." [";
		echo $error->{'error_code'}."] <br><pre>======= ";
		echo $token." =======<br>";
		print_r ($req_params);
		echo "</pre>";
	}	
	if ($err == 4){
		
		$req_params = $error->{'request_params'};
		echo $error->{'error_msg'}." <br><pre>";
		print_r ($error);
		echo "</pre>";
	}
	
		if ($err == 17){
		
		$redirect_uri = $error->{'redirect_uri'};
		echo "		
		<form action=\"page.php?id=albums\" method=\"post\">
		<button type=\"submit\" name=\"redirect_uri\" value=\".$redirect_uri.\" >Go</button>
		</form>";
		// echo $redirect_uri;
	}
	
} else {
	// $param[]['title'] = NULL;
	$response = $photos_arr->{'response'};
	$albums_count = count($response);
	for ($i = 0; $i < $albums_count; $i++) {

		foreach ($response[$i] as $key=>$value) {
			$param[$i][$key] = $value;
			// echo $key.": ".$value."<br>";
			
			
			// echo $param[$i]['id'];
			// echo "<br>";
			// echo $param[$i]['title'];
			// echo "<br>";
		}
		$album_title[$param[$i]['aid']] = $param[$i]['title'];		
		// echo "<hr>";
	}

}
		
}


	
	
	#########################################################################################
	##	{																					#
	##		"response": [{                              ---- $group_info->{'response'};		#
	##			"gid": 00000000,															#
	##			"name": "Имя заветной группы",
	##			"screen_name": "SHORT_NAME",
	##			"is_closed": 0,
	##			"type": "group",
	##			"is_admin": 0,
	##			"is_member": 0,
	##			"description": "Описание группы!",
	##			"photo": "https://pp.userap...ad7/u3apuk3nKek.jpg",
	##			"photo_medium": "https://pp.userap...ad6/jIsScXTOT5g.jpg",
	##			"photo_big": "https://pp.userap...ad5/7E-LEsUfG4k.jpg"
	##		}]
	##	}																					#	
	#########################################################################################
	
	
function groups_getById($group_ids){

	
	$GIfields = "city, country, place, description, wiki_page, members_count, counters, start_date, finish_date, can_post, can_see_all_posts, activity, status, contacts, links, fixed_post, verified, site, ban_info, cover";
	$Gid = $group_ids;
	
	// $group_json = file_get_contents('https://api.vk.com/method/groups.getById?group_ids='.$Gid.'fields='.$GIfields.'&access_token='.$userRow['token'].'' );
	$group_json = file_get_contents('https://api.vk.com/method/groups.getById?group_ids='.$Gid.'' );
	$group_arr = json_decode($group_json);
		//var_dump($group_arr);
	$group_info = $group_arr->{'response'};
		// var_dump($group_info);
	
	$gname = $group_info[0]->{'name'};
	$gid = $group_info[0]->{'gid'};
	
	
	
	print $gname;


}


function ShowPost($name,$time,$text,$ava){


echo "
                <div class='post'>
                  <div class='user-block'>
                    <img class='img-circle img-bordered-sm' src='$ava' alt='user image'>
                        <span class='username'>
                          <a href='#'>$name</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                    <span class='description'>Опубликовано - $time</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    $text
                  </p>
                  <ul class='list-inline'>
                    <li><a href='#' class='link-black text-sm'><i class='fa fa-share margin-r-5'></i> Share</a></li>
                    <li><a href='#' class='link-black text-sm'><i class='fa fa-thumbs-o-up margin-r-5'></i> Нравится</a>
                    <li><a href='#' class='link-black text-sm'><i class='fa fa-thumbs-o-down margin-r-5'></i> Не нравится</a>
                    </li>
                    <li class='pull-right'>
                      <a href='#' class='link-black text-sm'><i class='fa fa-comments-o margin-r-5'></i> Комментариев
                        (5)</a></li>
                  </ul>

                  <input class='form-control input-sm' type='text' placeholder='Ваш комментарий'>
                </div>";
}
function GetFrends($owner_id,$token){
	
	// @$captcha = '&captcha_sid='.$_GET ['captcha_sid'].'&captcha_key='.$_GET ['captcha_key'];
	// echo $captcha;
	
	global $param;
	global $albums_count;
	global $album_title;
	global $group_title;
	global $error;
	global $frends;
	global $frends_count;
	global $frends_items;
	global $first_name;

	
	// if $user_id = 
	$id = 'owner_id='.$owner_id.'&';

			 
				// if (($owner_id{0})<>"-"){
					// $id = 'owner_id=-'.$owner_id.'';
				// } else {
					// $id = 'owner_id='.$owner_id.'';
				// };

	
	
	
    
	// $json = file_get_contents('https://api.vk.com/method/friends.get?order=name&fields=city,domain&access_token=81121d95d315bddfe8448fcbdd07884c7fb4b0a6e3730ad99b7f94d923991d2f6fe2fdbd068bf2716370b'.$token.''.$captcha );
	$json = file_get_contents('https://api.vk.com/method/friends.get?order=name&fields=city,domain&access_token='.$token.''.$captcha.'&v=5.69');
	$photos_arr = json_decode($json);
	

	@$error = $photos_arr->{'error'};
	
	
	
if(isset($error)) {
	$err = $error->{'error_code'};
	if ($err == 5){
		echo "
			Ошибка: [".$error->{'error_code'}."] <b>".$error->{'error_msg'}."</b> <br><br>
			<img src=".$error->{'captcha_img'}.">
			<form action='page.php?id=albums'>
			<p>
			<input type='text' hidden name='id' value='albums'><Br>
			<input type='text' hidden name='captcha_sid' value=".$error->{'captcha_sid'}."><Br>
			<input type='text' name='captcha_key' value=''><Br>
			</p>
			<p><input type='submit'></p>
			</form>";

	}
	
	if ($err == 3){
		
		$req_params = $error->{'request_params'};
		echo $error->{'error_msg'}." <br><pre>";
		print_r ($req_params);
		echo "</pre>";
	}
	
	if ($err == 5){
		
		$req_params = $error->{'request_params'};
		echo $error->{'error_msg'}." [";
		echo $error->{'error_code'}."] <br><pre>======= ";
		echo $token." =======<br>";
		print_r ($req_params);
		echo "</pre>";
	}	
	if ($err == 4){
		
		$req_params = $error->{'request_params'};
		echo $error->{'error_msg'}." <br><pre>";
		print_r ($error);
		echo "</pre>";
	}
	
		if ($err == 17){
		
		$redirect_uri = $error->{'redirect_uri'};
		echo "		
		<form action=\"page.php?id=albums\" method=\"post\">
		<button type=\"submit\" name=\"redirect_uri\" value=\".$redirect_uri.\" >Go</button>
		</form>";
		// echo $redirect_uri;
	}
	
} else {
	// $param[]['title'] = NULL;
	$response = $photos_arr->{'response'};
	$frends_count = $response->{'count'};
	$frends_items = $response->{'items'};


	for ($i = 0; $i < $frends_count; $i++) {

		// foreach ($response[$i] as $key=>$value) {
			// $param[$i][$key] = $value;
			// echo $key.": ".$value."<br>";
			
			
			// echo $param[$i]['id'];
			// echo "<br>";
			// echo $param[$i]['title'];
			// echo "<br>";
		// }
		// $album_title[$param[$i]['aid']] = $param[$i]['title'];		
		// echo "<hr>";
		$first_name[$i] = $response->{'first_name'};

		//$first_name[$i] = $response['first_name'];
		// var_dump($frends_items);
		//$frends_items = $response;
		$frends['first_name'] = $frends_items->{'first_name'};
	}

}
		
}
?>
