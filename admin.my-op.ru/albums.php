<?
$title = "Альбомы";
include "header.php";
$owner_id = $userRow['owner_id'];


$owner_id = $_GET['owner_id'];
// $owner_id_url= $userRow['owner_id'];
//	echo $_SESSION['owner_id'];
// $owner_id = $_GET['uid'];
// $owner_id_url = $_GET['owner_id'];
	if( !isset($_GET['owner_id']) ) {
		header("Location: albums".$_SESSION['owner_id']);
		exit;
	}
	
	if( !isset($owner_id) ) {
		header("Location: id".$_SESSION['owner_id']);
		exit;
	}	
	
//$owner_id = $userRow['owner_id'];
//$owner_id = $_GET['owner_id'];
// $owner_id = trim($owner_id_url,"-");


	// AlbumsGet($userRow['userId'], $userRow['token'], $iferr);
	AlbumsGet($owner_id, $userRow['token'], @$iferr);






	// echo "	</div>";
	?>



  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
		<?php include "sidebar.php"; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<?php	
	// echo $userRow['token']. $owner_id;
	// if (($owner_id{0})<>"-")
		// echo "<section class='content-header'><h1>".$userRow['FirstName']." ".$userRow['LastName']." ->  Альбомы <small>".$albums_count."</small></h1>";
	// else
	// echo "
	
	   	// <div class=\"page-header\">
    	// <h3>Альбомы сообщества <small>".$albums_count."</small></h3>
    // </div>
	
	// <br><br>
		
	// ";
echo	"<section class=\"content-header\">
      <h1>
        Альбомы $owner_id
        <small>$albums_count</small>
      </h1>";
	  
	 include "HTML/breadcrumb.html";

	 echo "</section>
	
	    <!-- Main content -->
    <section class=\"content\">

      <!-- Default box -->
      <div class=\"box\">

        <div class=\"box-body\">
	";
	
	for ($i = 0; $i < $albums_count; $i++) {

	echo '


				
				<a href="album'. @$owner_id .'_'.@$param[$i]['aid'].'">
			<div class="thumbnail" style="height: 200px; width: 250px; float: left; background: url('.@$param[$i]['thumb_src'].'); background-size: cover;" >
			
				<!-- <img  src="'.@$param[$i]['thumb_src'].'" /> -->
				
				<div class="caption" style="background: rgba(6, 6, 6, 0.32); margin-top: 140px;     border-radius: 4px;">
				<p style="color: white;     text-shadow: 2px 2px 3px black;">'. @$param[$i]['title'].' ['.@$param[$i]['size'].']</p>
				</div>
				
			</div>
				</a>
			<div style="height: 200px; width: 10px; float: left;">
			</div>

	';
	}
	echo "<div style='height: 2px; width: 100%; float: left;'></div>";
	// echo "<div class='row'><h1></h1></div>";
	// echo "<div class='img-responsive'>";
	
	//AllPhotoGet($owner_id,$userRow['token']);
	
	//for ($f = 0; $f < $photo_count; $f++) {
	//	$photo_75[$f] = $photo_items[$f]->{'photo_75'};
	//	$photo_album[$f] = $photo_items[$f]->{'album_id'};
	//	$photo_id[$f] = $photo_items[$f]->{'id'};
	//	echo "
	//	<a href=\"photo$owner_id"."_".$photo_id[$f]."\">
	//		<div class=\"thumbnail\" style=\"height: 200px; width: 250px; float: left; background: url('.@$param[$i]['thumb_src'].'); background-size: cover;\" >
			
				// <img  src=\"$photo_75[$f]\" />

				
			// </div>
		// </a>
			// <div style=\"height: 200px; width: 10px; float: left;\">
			// </div>";
	 //var_dump($photo_items[1]);
	 		
			//$photo_75[$f] = $photo_items[$f]->{'photo_75'};
			// var_dump($photo_items);
			//echo "</br>";
			//echo $f.". ".$photo_75[$f]."</br>";
	//}
	echo "</div>";
?>		
	
	



       
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          пакман &copy;
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<? include "footer.php";?>

  	<!-- Control Sidebar -->
		<? include "HTML/Control_Sidebar.html";?>
	<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>