<html>
<head>
	<title></title>
</head>
<body>

<?php
	$charrus=mysql_query("set names 'cp1251'");
	if($_GET['id_pract'])
		$current_pract = $_GET['id_pract']; 

	$query_get_pract_name = mysql_query("SELECT * FROM pract WHERE id = '$current_pract'");
	$row_pract_name = mysql_fetch_array($query_get_pract_name);
	$current_pract_name = $row_pract_name['name'];
?>
<p id="nav_name"><?php echo $current_pract_name; ?></p>
<div id="content_writing_style">
	<?php 
	$user_in = $_SESSION['user_id'];
	$user_now = $_SESSION['user_id'];
	$query_user_inform = mysql_query("SELECT * FROM users WHERE id='$user_now'");
	$row_inform_user = mysql_fetch_array($query_user_inform);

	$studnt_id = $_GET['id_student'];
	$m_mark = $_POST['pract_mark'];

	$q_get_mark = mysql_query("SELECT marc FROM marc_pract WHERE id_pract='$current_pract' and id_user='$studnt_id'");
	$row_get_mark = mysql_fetch_array($q_get_mark);
	
	$student_get_mark = mysql_query("SELECT marc FROM marc_pract WHERE id_pract='$current_pract' and id_user='$user_in'");
	$student_get_mark = mysql_fetch_array($student_get_mark);
	$stud_mark = $student_get_mark['marc'];
	echo '<div id="pract_task_descr">';
	echo '<font id="pract_title">����� �������� :</font><br><font id="pract_content">'.$row_pract_name['description'].'</font><br>';
	echo '<font id="pract_title">���� ����� : </font><font id="pract_content">'.$row_pract_name['date'].'</font><br>';
	echo '<font id="pract_title">����������� ������ : </font><font id="pract_content">'.$row_pract_name['max_mark'].'</font><br>';
	if ($row_inform_user['type'] == 1)
		echo '<font id="pract_title">���� ������ : </font><font id="pract_content">'.$stud_mark.'</font><br>';
	if ($row_inform_user['type'] == 2)
	{
		if ($row_get_mark['marc'] >= 1)
		{
			$marc = $row_get_mark['marc'];
			echo  '<font id="pract_title">�� ��������� ������ : </font>'.$marc.'';
			echo '<form method="post">';
				echo '<font id="pract_title">��������� ���� ������ : </font><input type="text" class="mark_field" name="pract_mark" value = "" >';
				echo '	<input type="submit" name= "update_put_mark" value="���������" id="mark_button">';
			echo '</form>';
		}
		else 
		{
			echo '<form method="post">';
				echo '<font id="pract_title">��������� ������ : </font><input type="text" class="mark_field" name="pract_mark" value = "" >';
				echo '	<input type="submit" name= "put_mark" value="���������" id="mark_button">';
			echo '</form>';
		}
	}
	echo '</div>';
	?>
	<?php 
	$user_in = $_SESSION['user_id'];
	$user_now = $_SESSION['user_id'];
	$query_user_inform = mysql_query("SELECT * FROM users WHERE id='$user_now'");
	$row_inform_user = mysql_fetch_array($query_user_inform);

	if ($_POST['put_mark'])
	{
		$studnt_id = $_GET['id_student'];
		$m_mark = $_POST['pract_mark'];
		$quey_insert_mark = mysql_query("INSERT INTO marc_pract(id_pract, id_user, marc) 
			VALUES ('$current_pract', '$studnt_id', '$m_mark')");
		echo '<script type="text/javascript">
           		window.location = "index.php?sidebar=current_pract&id_pract='.$current_pract.'&id_student='.$studnt_id.'"
        	</script>';
	}

	if ($_POST['update_put_mark'])
	{
		$studnt_id = $_GET['id_student'];
		$_new_mark = $_POST['pract_mark'];
		$quey_insert_mark = mysql_query("UPDATE marc_pract set marc='$_new_mark'
			WHERE id_user='$studnt_id' and id_pract='$current_pract'");
		echo '<script type="text/javascript">
           		window.location = "index.php?sidebar=current_pract&id_pract='.$current_pract.'&id_student='.$studnt_id.'"
        	</script>';

	}





	if ($row_inform_user['type'] == 1)
	{
		if ($_GET['id_pract'])
			$id_practice = $_GET['id_pract'];
		$query_get_teach_id = mysql_query("SELECT teacher FROM courses
			LEFT JOIN pract ON pract.id_course = courses.id
			WHERE pract.id='$id_practice'");
		$some_teach_id = mysql_fetch_array($query_get_teach_id);
		$tt_id = $some_teach_id['teacher'];
	/// ��� �� user.id = ��������� ��������� �����
		$query_get_pract_reply = mysql_query("SELECT pract_reply.reply as 'reply', pract_reply.datetime as 'datetime', users.name as 'name', users.surname as 'surname', users.avatar as 'avatar'
		 FROM pract_reply LEFT JOIN users ON pract_reply.id_user = users.id 
		 WHERE id_pract='$current_pract' and (users.id = '$user_in' or (users.id = '$tt_id' and pract_reply.id_to_user = '$user_in')) 
		 ORDER by datetime ");
		if ($query_get_pract_reply)
		{
			while ($row_get_pract_reply = mysql_fetch_array($query_get_pract_reply))
			{
				echo '<div id="pract_reply_block">';
				echo '<div id="pract_reply_block_avatar">';
				echo '<img src="images/avatar/'.$row_get_pract_reply['avatar'].'.jpg"  alt="" id="comment_avatar" >';
				echo '</div>';
				echo '<div id="pract_reply_block_message">'; echo '<font id="name_surname_comment">';
				echo $row_get_pract_reply['name']." ".$row_get_pract_reply['surname']."<br>"; echo '</font>'; echo '<font id="reply_comment">';
				echo $row_get_pract_reply['reply']; echo '</font><br>';  echo '<font id="reply_datetime">';
				echo $row_get_pract_reply['datetime']; echo '</font>';
				echo '</div>';
				echo '</div>';
			}
		}
		
	}
	if ($row_inform_user['type'] == 2)
	{

		if ($_GET['id_student'])
			$stud_id = $_GET['id_student'];
	/// ��� �� user.id = ��������� ��������� �����
		$query_get_pract_reply = mysql_query("SELECT pract_reply.reply as 'reply', pract_reply.datetime as 'datetime', users.name as 'name', users.surname as 'surname', users.avatar as 'avatar'
		 FROM pract_reply LEFT JOIN users ON pract_reply.id_user = users.id 
		 WHERE id_pract='$current_pract' and ((users.id = '$user_in' and pract_reply.id_to_user = '$stud_id') or users.id = '$stud_id')
		 
		 ORDER by datetime");
		if ($query_get_pract_reply)
		{
			while ($row_get_pract_reply = mysql_fetch_array($query_get_pract_reply))
			{
				echo '<div id="pract_reply_block">';
				echo '<div id="pract_reply_block_avatar">';
				echo '<img src="images/avatar/'.$row_get_pract_reply['avatar'].'.jpg"  alt="" id="comment_avatar" >';
				echo '</div>';
				echo '<div id="pract_reply_block_message">'; echo '<font id="name_surname_comment">';
				echo $row_get_pract_reply['name']." ".$row_get_pract_reply['surname']."<br>"; echo '</font>'; echo '<font id="reply_comment">';
				echo $row_get_pract_reply['reply']; echo '</font><br>';  echo '<font id="reply_datetime">';
				echo $row_get_pract_reply['datetime']; echo '</font>';
				echo '</div>';
				echo '</div>';
			}
		}
		
	}
		?>
		<?php 
		echo '<br><br><font id="pract_title">�������� �������: </font>';
		
		?>
	<form method="post">
		<textarea id="textarea2" name="task_pract_description" class="ggrtgrt" rows="8" cols="50"></textarea><br>
				<input type="submit" name= "pract_reply_submit" value="��������" id="left_button">
	</form>


	<?php 
	if ($_POST['pract_reply_submit'])
	{
		if ($_GET['id_student'])
			$njgr = $_GET['id_student'];
		else $njgr = 0;
		$user_in = $_SESSION['user_id'];
		$my_pract_reply = $_POST['task_pract_description'];
		$today = date("Y-m-d H:i:s");
		$mysql_query_insert_pract_reply = mysql_query("INSERT INTO pract_reply(id_user, id_pract, reply, datetime, id_to_user) 
			VALUES ('$user_in', '$current_pract', '$my_pract_reply', '$today', '$njgr')");
		$studnt_id = $_GET['id_student'];
		echo '<script type="text/javascript">
           		window.location = "index.php?sidebar=current_pract&id_pract='.$current_pract.'&id_student='.$studnt_id.'"
        	</script>';

	}

	?>

</div>




</body>
</html>