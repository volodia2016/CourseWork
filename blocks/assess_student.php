<html>
<head>
	<title></title>
</head>
<body>

<p id="nav_name">������� ��������</p>
<div id="content_writing_style">
������ �������� ������������� �� ������ ���� : 
<?php 
	$charrus=mysql_query("set names 'cp1251'");
	$id_cur_course = $_GET['id_course'];

	$id_cur_pract = $_GET['id_pract'];
	$id_cur_laba = $_GET['id_laba'];
	$query_get_registered_users = mysql_query("SELECT users.id as 'id', name, surname, avatar FROM users
		LEFT JOIN users_course ON users_course.id_user=users.id
		WHERE id_course = '$id_cur_course' ");
	if ($query_get_registered_users)
	{
		while ($row_get_reg_users = mysql_fetch_array($query_get_registered_users))
		{
			$student_id = $row_get_reg_users['id'];
			echo '<div id="pract_reply_block">';
			echo '<div id="pract_reply_block_avatar">';
			echo '<img src="images/avatar/'.$row_get_reg_users['avatar'].'.jpg"  alt="" id="comment_avatar" >';
			echo '</div>';
			echo '<div id="pract_reply_block_message">'; echo '<font id="name_surname_comment">';
			if ($id_cur_pract)
				echo '<a href="index.php?sidebar=current_pract&id_pract='.$id_cur_pract.'&id_student='.$student_id.'">';
			if ($id_cur_laba)
				echo '<a href="index.php?sidebar=current_laba&id_laba='.$id_cur_laba.'&id_student='.$student_id.'">';
			echo $row_get_reg_users['name']." ".$row_get_reg_users['surname']."</a><br>"; echo '</font>'; echo '<font id="reply_comment">';
			echo $row_get_pract_reply['reply']; echo '</font><br>';  echo '<font id="reply_datetime">';
			
			echo '</div>';
			echo '</div>';
		}
	}
?>
</div>


</body>
</html>