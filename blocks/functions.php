<?php

include 'blocks/db.php';


function check_name($l_password, $r_password)
{
	if ($l_password==null or $r_password==null)
		echo "Поля з паролем мають бути заповненні.<br>";
	else 
	{
		if (strlen($l_password) < 5)
			echo "Пароль має містити щонайменше 5 символів.<br>";
		else 
		{
			if ($l_password != $r_password)
				echo "Паролі не співпадають.<br>";
			else return true;
		}
	}
}

function check_mail($mail)
{
	if (filter_var($mail, FILTER_VALIDATE_EMAIL))
		return true;
	else
		echo "Не правильно вказано E-mail.<br>";
}

function check_nsl($name, $surname, $login)		//check name, surname, mail
{
	$error = false;
	if($name == null){ echo  "Поле Ім'я має бути заповненим.<br>"; $error=true;}
	$query = mysql_query("SELECT * FROM users WHERE login = '$login'");
	$row = mysql_fetch_array($query);
	$numb_rows = mysql_num_rows($query);
	if ($numb_rows != 0) {echo "Користувач з таким логіном вже існує.<br>";}
	if($surname == null){ echo  "Поле Прізвище має бути заповненим.<br>";$error=true;}
	if($login == null){ echo  "Поле Login має бути заповненим.<br>";$error=true;}
	if($error==false)
		return true;

}

function name($l_password, $r_password)
{
	if ($l_password==null or $r_password==null)
		echo "";
	else 
	{
		if (strlen($l_password) < 5)
			echo "";
		else 
		{
			if ($l_password != $r_password)
				echo "";
			else return true;
		}
	}
}

function my_mail($my_mail)
{
	if (filter_var($my_mail, FILTER_VALIDATE_EMAIL))
		return true;
	else
		echo "";
}

function nsl($name, $surname, $login)		//check name, surname, mail
{
	$error = false;
	if($name == null){ echo  ""; $error=true;}
	if($surname == null){ echo  "";$error=true;}
	if($login == null){ echo  "";$error=true;}
	$query = mysql_query("SELECT * FROM users WHERE login = '$login'");
	$row = mysql_fetch_array($query);
	$numb_rows = mysql_num_rows($query);
	if ($numb_rows != 0) {echo ""; $error=true;}
	if($error==false)
		return true;


	
}
	function add_video_table($video_id, $user_id) {
	//$query = mysql_query("INSERT INTO users_movies(id_user, id_video) VALUES ('$user_id', '$video_id')");
	//echo '<script type="text/javascript">
      //     window.location = "index.php?sidebar=video"
        //
	
	echo "kiki";

	}






?>

<script>


</script>

<script>
function msg() {
    alert("Hello world!");
}
</script>




