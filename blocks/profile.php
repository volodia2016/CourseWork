<?php session_start();?>
<html>
<head>
<title>Profile</title>
</head>

<body>
<p id="nav_name">̳� �������</p>
<div id="content_writing_style">
	<div id="profile_block">
		<?php 
			//include 'blocks/upload.php';
			$id_user = $_SESSION['user_id'];
			$charrus=mysql_query("set names 'cp1251'");
			$query = mysql_query("SELECT * FROM users where id ='$id_user'");
			$row = mysql_fetch_array($query);
			
			if ($_SESSION['user_log_in'] != 0)
			{
			
			}
			else
				echo '<font id="just_error">��� �������� ������� ����� � �������.</font>'; 
		?>
		<div id="profile_avatar">
		<?php 
		if ($_SESSION['user_log_in'] != 0)
		{
			
			
		if ($row['avatar'])
			echo '<img src="images/avatar/'.$row['avatar'].'.jpg"  alt="" id="profile_avatar" >';
		?>
		</div>

		<div id="profile_inform">
		<ul id="profile_list">
			<li>��'� : <p id="profile_inf_db"><?php echo $row['name'];?></li></p>
			<li>������� : <p id="profile_inf_db"><?php echo $row['surname'];?></p>
			<li>������ : <p id="profile_inf_db"><?php echo $row['position'];?></p>
			<li>����� : <p id="profile_inf_db"><?php echo $row['mail'];?></p>
			<li>���� : <p id="profile_inf_db"><?php echo $row['login'];?></p>
		</ul>
		</div>

		<button class="edit_button" id="edit1">
			<a href = "index.php?sidebar=edit_profile" id="lol"><img src="images/edit_pic.png"  alt="������" id="edit_picture" >
				<p id="edit_button_text">����������</p></a>
		</button>
		

		<?php  } ?>






		
	</div>


		
	</div>

</div>
</body>

</html>