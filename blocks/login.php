<?php session_start();
?>

<html>

<head>
<title>Login</title>
</head>

<body>
	<p id="nav_name">���� � �������</p>
	<div id="content_writing_style">
		��� �����  � ������� ������ ��� Login �� ������ �������� ��� ���������. <br><br>
		<form method="post">
			���� :<br> <input type="text" class="textbox1" name="login" value = "<?php echo $_POST['login'] ?>" > <br><br>
			������ :<br> <input type="password" class="textbox1" name="password" value = "" ><br><br>
				<input type="submit" name= "submit" value="�����" id="login_button">
		</form>
		<?php
			//session_start();
			$i=0;
			//echo $_SESSION['in'];
			if ($_SESSION['in']==1)
			{
				echo "�� ������ � �������!<br>";
				echo '<a href="index.php?sidebar=profile"><br>������� � ��� �������.</a>';	
			}
			if ($_POST['submit'] and $_SESSION['in']!=1)
			{

				$login = $_POST['login'];
				$password = $_POST['password'];
				//echo "<br>�� ������� login= ".$login." �� mail=".$mail;
				$i = $i+1;	
				$query = mysql_query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
				$row = mysql_fetch_array($query);
				$numb_rows = mysql_num_rows($query);
				if ($numb_rows !=0)
				{	
					
					$_SESSION['user_id'] = $row['id'];
					$_SESSION['login'] = $row['login'];
					$_SESSION['user_log_in'] = $row['type'];
					$_SESSION['in'] = 1;
					
					echo "�� ������ � �������!<br>";
					
					echo '<a href="index.php?sidebar=profile"><br>������� � ��� �������.</a>';	

					echo '<script type="text/javascript">
           				window.location = "index.php?sidebar=profile"
        			</script>';
										
				}
				else
					echo "<br>���� ��� ������ ���� ������ �����������.";
				
			}
			
			
		?>









	</div>





</body>

<html>