<?php
    session_start();
    if(isset($_SESSION['point'])) header ("Location: index.php");;
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="css/auth.css" />
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
    <link href='https://fonts.googleapis.com/css?family=Russo+One&subset=latin,cyrillic' rel='stylesheet' type='text/css' />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://www.modernizr.com/downloads/modernizr-latest.js"></script>
	<script type="text/javascript" src="js/placeholder.js"></script>
    
</head>
<body>
    <form id="slick-login" action="login.php" method="post"> <!-- Форма авторизации -->
		<label for="username">Логин:</label><input  type="text" autofocus="" maxlength="20" name="user" class="placeholder" placeholder="Логин" />
		<label for="password">Пароль:</label><input type="password" maxlength="20" name="pass" class="placeholder" placeholder="Пароль" />
		<input type="submit" value="ВОЙТИ" />
	</form>
</body>
</html>