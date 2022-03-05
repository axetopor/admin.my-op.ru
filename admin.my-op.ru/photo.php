<?
include "header.php";

echo $_SESSION['user'];

$owner_id = $userRow['owner_id'];
$owner_id = $_GET['owner_id'];
$album_id = $_GET['album_id'];
$title = $album_id;
PhotoGet($owner_id,$album_id,$userRow['token']);
	?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 

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
    <section class="content-header">
      <h1>
        <? echo "Фотография"; ?>
        <small></small>
      </h1>

	  <? include "HTML/breadcrumb.html"; ?>
	  
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">
		  $owner_id: <? echo $owner_id; ?> || 
          $album_id: <? echo $album_id; ?></h3>


        </div>
        <div class="box-body">

			</br>
			<img src='<? echo $photo[src_xbig];?>'>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
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
