<?


//echo $_SESSION['user'];


$owner_id = $_GET['owner_id'];

$title = "Друзья";
include "header.php";
$token = $userRow['token'];
$owner_id = $userRow['owner_id'];

GetFrends($owner_id,$token);
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
        <? echo $title; ?>
        <small>			<? 
				echo $frends_count;
			?></small>
      </h1>
	<!-- ========= Хлебные крошики =================== -->
	<?php include "HTML/breadcrumb.html"; ?>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-body">
			Токен: 
			<? echo $userRow['token']; ?>
			<? //echo var_dump($frends_items[0]); ?>

			</br>
			<? //var_dump($frends_items);?>
			
			<? for ($i = 0; $i < $frends_count; $i++) {?>
	<a href="/id<? echo $frends_items[$i]->{'id'}; ?>">
			<? $online_b[$i] = $frends_items[$i]->{'online'}; 
				if ($online_b[$i] == "0"){
					$online_text[$i] = "<i class='fa fa-user-circle-o  text-red'></i>";
				} else if ($online_b[$i] == "1"){
					$online_text[$i] = "<i class='fa fa-user-circle-o  text-green'></i>";
				}
			?>
			<? echo "<i class=\"fa fa-address-card-o\" aria-hidden=\"true\"></i> ".$frends_items[$i]->{'first_name'}.' '; ?>
			<? echo $frends_items[$i]->{'last_name'}.' '; ?></a>
			<? //echo $frends_items[$i]->{'domain'}.' || '; ?>
			<? echo $online_text[$i].'<br>'; 
			}?>
			
			
			
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
