<html>
<head>
	<title></title>
</head>
<body>

<?php
if ($_GET['type'] == 1)
	$qwerty = "���� ��������� ������";
if ($_GET['type'] == 2)
	$qwerty = "���� ����������� ������";
if ($_GET['type'] == 3)
	$qwerty = "����� ����";

?>
<p id="nav_name"><?php  echo $qwerty; ?> </p>
<div id="register_field_left">
	<?php if ($_GET['type'] == 1) { ?>
	<form method="post">
		����� ��������� ������ :</p><input type="text" class="textbox1" name="task_pract_name" value = "<?php echo $_POST['user_name'] ?>" > <br><br>
		����������� ������ :</p><input type="text" class="textbox1" name="max_marc_pract" value = "<?php echo $_POST['user_name'] ?>" > <br><br>
		���� ����� : <input type="date" class="textbox1"  name="task_pract_date"><br><br>
		���� �������� : <br>
		<textarea id="textarea1" name="task_pract_description" class="ggrtgrt" rows="8" cols="50"></textarea><br>
		<input type="submit" value="ϳ���������" name="add_new_pract" id="submit_button">
	</form>
	<?php } ?>


	<?php if ($_GET['type'] == 2) { ?>
	<form method="post" enctype="multipart/form-data">
		����� ����������� ������ :</p><input type="text" class="textbox1" name="task_laba_name" value = "<?php echo $_POST['user_name'] ?>" > <br><br>
		����������� ������ :</p><input type="text" class="textbox1" name="max_marc_laba" value = "<?php echo $_POST['user_name'] ?>" > <br><br>
		���� ����� : <input type="date" class="textbox1"  name="task_laba_date"><br><br>
		��������� ����: <input name="filename" type="file" ><br><br>
		���� �������� : <br>
		<textarea id="textarea1" name="task_laba_description" class="ggrtgrt" rows="8" cols="50"></textarea><br>
		<input type="submit" value="ϳ���������" name="add_new_laba" id="submit_button">	
		</form>
	</form>
	<?php } ?>





</div>
	<?php 
	$charrus=mysql_query("set names 'cp1251'");
	if ($_POST['add_new_pract'])
	{
		$mm =  $_POST['max_marc_pract'];
		$cur_course = $_GET['course_id'];
		$my_date = $_POST['task_pract_date'];
		$my_description = $_POST['task_pract_description'];
		$my_name = $_POST['task_pract_name'];
		$cur_id = $_GET['course_id'];
		$query_insert_pract = mysql_query("INSERT INTO pract(date, description, name, id_course, max_mark) 
			VALUES ('$my_date', '$my_description', '$my_name', '$cur_course', '$mm')");
		echo '<script type="text/javascript">
           		window.location = "index.php?sidebar=current_course&course_id='.$cur_id.'"
        	</script>';
	}
	if ($_POST['add_new_laba'])
	{
		$mm =  $_POST['max_marc_laba'];
		$cur_course = $_GET['course_id'];
		$my_date = $_POST['task_laba_date'];
		$my_description = $_POST['task_laba_description'];
		$my_name = $_POST['task_laba_name'];
		$cur_id = $_GET['course_id'];
		if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
	    {
	    	$fule_name = $_FILES['filename']['name'];
	    	$part_name = explode(".", $fule_name);
	    	$expansion = $part_name[1];
	    	//$query = mysql_query("UPDATE laba SET laba = '$fule_name' WHERE id_course='$cur_course'");
		    /*$filename = $cur_course.".".$expansion;*/
		    $filename = $fule_name;
		    $_FILES['userfile']['tmp_name'] = $row['id'];
		    //echo $_FILES['userfile']['name'];
	    	move_uploaded_file($_FILES["filename"]["tmp_name"], "Z:/home/localhost/www/documents/teacher_labs/".$filename);
	    } 
		$query_insert_pract = mysql_query("INSERT INTO laba(date, description, name, id_course, max_mark, laba) 
			VALUES ('$my_date', '$my_description', '$my_name', '$cur_course', '$mm', '$fule_name')");
		echo '<script type="text/javascript">
           		window.location = "index.php?sidebar=current_course&course_id='.$cur_id.'"
        	</script>';
	}

	?>


</body>
</html>