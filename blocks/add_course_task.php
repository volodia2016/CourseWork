<html>
<head>
	<title></title>
</head>
<body>


<p id="nav_name">�������� ���� ��������</p>
<div id="content_writing_style">
	
	��� ����, ��� �������� ���� �������� �������� ������� ��� ��������, ��� �� ���� ��������.
	����� �� ������ �������� 3 ���� ������� : <br>
	1) �������� "��������� ������". <br>
	2) �������� "����������� ������".<br>
	3) �������� "����".<br><br>
	<p id="task_type_title">"��������� ������"</p>
	<p id="task_type_dexcription">�� �����, ��� ��������, �� ������� ������ �������� ����� ��������, �� ���� �������� ��������� "�� ����". </p>


	<br><p id="task_type_title">"����������� ������"</p>
	<p id="task_type_dexcription">�� �����, ��� ��������, �� ������� ������ �������� ����� ��������, �� ���� �������� ��������� "�� ����",
	��� ����� ��������� ��������� ����������� ������ ����� � ������ ����. </p>

	<br><p id="task_type_title">"����"</p>
	<p id="task_type_dexcription">�� �����, ��� ��������, �� ������� ��������� ���� �� �������� ���������� �������. </p>

	<br><p id="treuityuei">������ ��� ��������, ��� �� � ����� �������� �� ���� : </p>
		<form method="post">
			<select name="type" size="1" id="type_add_task">
				<option value="pract">��������� ������</option>
				<option value="laba">����������� ������</option>
				<option value="test">����</option>
			</select>
			<br><br><input type="submit" value="���" name="next_button" id="next_button">
		</form>


	<?php 
		$charrus=mysql_query("set names 'cp1251'");
		if($_POST['next_button']) 
		{
			if ($_GET['id_course'])
				$some_id = $_GET['id_course'];
			if ($_POST['type'] == "pract")
				$type = 1;
			if ($_POST['type'] == "laba")
				$type = 2;
			if ($_POST['type'] == "test")
				$type = 3;
			
			echo '<script type="text/javascript">
           		window.location = "index.php?sidebar=add_current_task&type='.$type.'&course_id='.$some_id.'"
        	</script>';

		}
	?>

</div>




</body>
</html>