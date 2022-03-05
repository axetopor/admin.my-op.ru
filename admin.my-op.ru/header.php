<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	//require_once 'config.php';
	require_once 'functions.php';
	//$_SESSION['owner_id'] = NULL;
	$owner_id = $_GET['owner_id'];
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['owner_id']) ) {
		header("Location: login.php");
		exit;
	}
	if( !isset($_GET['owner_id']) ) {
		header("Location: login.php");
		exit;
	}
	//
	

	//$id = $_GET['id'];
	$userRow = NULL;
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE owner_id=".$_SESSION['owner_id']);
	// $res=mysql_query("SELECT * FROM users WHERE owner_id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title."".$users_response[0]->{'first_name'}.' '.$users_response[0]->{'last_name'}; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

	<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>My</b>Op</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>My</b>-op.ru</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
-->
		<?php include "navbar.php"; ?>
    </nav>

  </header>