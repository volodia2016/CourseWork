<?php session_start();?>

<html>
<head>
<title>Edit profile</title>
</head>



<body>
	<p id="nav_name">Редагувати профіль</p>
	<div id="content_writing_style">
		Для того, щоб змінити якесь поле про себе, напишіть нову інформація в відповідному полі, а всі інші поля залишіть пустими та нажміть кнопку "Підтвердити".<br>
		Для того, щоб обрати собі аватар, виберіть файл. Файл має мати розширення "jpg".<br>
		<div id="get_avatar">
			<br>
			<div class="fileUpload btn btn-primary">
				<form method="post" enctype="multipart/form-data">
		      		Аватар : <input type="file" name="filename" id="avatar_button1" >
		      		

		      		<br><br>Нове ім'я :<br> <input type="text" class="textbox1" name="user_name" value = "<?php echo $_POST['user_name'] ?>" > <br><br>
					Нове прізвище :<br> <input type="text" class="textbox1" name="surname" value = "<?php echo $_POST['surname'] ?>" > <br><br>
					Новий E-mail :<br> <input type="text" class="textbox1" name="mail" value = "<?php echo $_POST['mail'] ?>" ><br><br>
					Новий Login :<br> <input type="text" class="textbox1" name="login" value = "<?php echo $_POST['login'] ?>" > <br><br>
					
					Для зміни паролю до вашого акаунта, введіть свій поточний пароль, та пароль на який ви хочете його замінити.<br><br>


					Поточний пароль :<br> <input type="password" class="textbox1" name="l_password" value = "<?php echo $_POST['l_password'] ?>" ><br><br>
					Новий пароль :<br> <input type="password" class="textbox1" name="r_password" value = "<?php echo $_POST['r_password'] ?>" ><br><br>
					<input type="submit" value="Підтвердити" name="submit" id="submit_button">

		      	</form>
	      	</div>
	      	<?php
	      	if ($_POST['submit'] )
	      	{
	      		$charrus=mysql_query("set names 'cp1251'");
	      		$name = $_POST['user_name'];
				$surname = $_POST['surname'];
				$mail = $_POST['mail'];
				$login = $_POST['login'];
				$l_password = $_POST['l_password'];
				$r_password = $_POST['r_password'];
				




	      		$user_id  = $_SESSION['user_id'];
	      		if ($name)	$query = mysql_query("UPDATE users SET name = '$name' WHERE id='$user_id'");
	      		if ($surname)	$query = mysql_query("UPDATE users SET surname = '$surname' WHERE id='$user_id'");
	      		if ($mail)	$query = mysql_query("UPDATE users SET mail = '$mail' WHERE id='$user_id'");
	      		if ($login)	$query = mysql_query("UPDATE users SET login = '$login' WHERE id='$user_id'");
	      		


	      		$query = mysql_query("SELECT * FROM users WHERE id = '$user_id'");
				$row = mysql_fetch_array($query);
			   	if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
			    {
			    	$query = mysql_query("UPDATE users SET avatar = '$user_id' WHERE id='$user_id'");
				    $filename = $row['id'].".jpg";
				    $_FILES['userfile']['tmp_name'] = $row['id'];
				    echo $_FILES['userfile']['name'];
			    	move_uploaded_file($_FILES["filename"]["tmp_name"], "Z:/home/localhost/www/images/avatar/".$filename);
			    } 
			    else 
			    {
			    		echo "Помилка завантаження файлу.";
			    }
			    echo '<script>window.location.href = "index.php?sidebar=profile";</script>';
			}
	      	?>
		</div>
		<br>

		




	</div>	
</body>
</html>