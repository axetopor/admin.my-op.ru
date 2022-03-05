<?php
	 ob_start();
	session_start();
	if( isset($_SESSION['owner_id'])!="" ){
		header("Location: index.php");
	}
	include_once 'dbconnect.php';

	$error = false;
	//$name = NULL;
	$nameError = false;
	$emailError = false;
	$email = NULL;
	$passError = false;
	
	
	
	if ( isset($_POST['btn-signup']) ) {
		
		// очистка введённого текста для защиты от SQL иньекций
		// $name = trim($_POST['name']);
		// $name = strip_tags($name);
		// $name = htmlspecialchars($name);
		// echo $name;
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		// echo $email;
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// echo $pass;
		
		// проверка логина
		// if (empty($name)) {
			// $error = true;
			// $nameError = "Пожалуйста, введите своё имя";
		// } else if (strlen($name) < 3) {
			// $error = true;
			// $nameError = "Логин не может быть короче 3х символов.";
		// } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			// $error = true;
			// $nameError = "Логин может содержать только буквы и пробел";
		// }
		
		//основная проверка почты
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Пожалуйста введите правильный e-mail";
		} else {
			// проверка на существование
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Этот e-mail уже зарегистрирован";
			}
		}
		// проверка поля пароля
		if (empty($pass)){
			$error = true;
			$passError = "Пожалуйста введите пароль.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Пароль не может быть короче шести символов";
		}
		
		// шифруем пароль с SHA256();
		$password = hash('sha256', $pass);
		
		// если нет ошибок
		if( !$error ) {
			
			// $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
			$query = "INSERT INTO users(userEmail,userPass) VALUES('$email','$password')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Регистрация успешно завершена, можете войти";
				//unset($name);
				unset($email);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Что-то пошло не так, попробуйте позже...";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Регистрация</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>Admin</b>My-Op.ru</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Регистрация</p>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
	<!--
	<div class="form-group has-feedback">
        <input name="name" type="text" class="form-control" placeholder="Логин">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
	-->
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="E-mail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="pass" type="password" class="form-control" placeholder="Пароль">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Повтор пароля">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Я согласен с <a href="#">правилами</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		  <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-signup">ОК</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  <!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>
-->
    <a href="login.php" class="text-center">Я уже зарегистрирован</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>