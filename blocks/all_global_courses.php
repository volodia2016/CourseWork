<html>
<head>
	<title></title>
</head>
<body>
<p id="nav_name">Всі курси на PGVsite</p>
<div id="content_writing_style">
<script>
	function toggle(el) {
	   el.style.display = (el.style.display == 'none') ? '' : 'none'
	}
</script>
	<div id="courses_list">
	<?php 
	$charrus=mysql_query("set names 'cp1251'");
	$query_get_teacher_course= mysql_query("SELECT distinct courses.name as 'cours_name', courses.id, users.name, users.surname FROM courses 	LEFT JOIN users ON courses.teacher = users.id");
	
	$user_now = $_SESSION['user_id'];
	$query_user_inform = mysql_query("SELECT * FROM users WHERE id='$user_now'");
	$row_inform_user = mysql_fetch_array($query_user_inform);
	
	if ($row_inform_user['type'] == 1)
	{

		while ($row_teacher_course = mysql_fetch_array($query_get_teacher_course))
		{
			$aqwr = $row_teacher_course['id'];
			$query_ger_registe_on_course = mysql_query("SELECT count(*) as total from users_course 
			WHERE id_course = '$aqwr'");
			$data = mysql_fetch_assoc($query_ger_registe_on_course);

			$query_entered_course = mysql_query("SELECT id_course FROM users_course 
				where id_user='$user_now' and id_course='$aqwr'");



			echo '<div id="curr_course_output">';
			echo '<p id="curr_course_name"><a href="index.php?sidebar=current_course&course_id='.$row_teacher_course['id'].'">'.$row_teacher_course['cours_name'].'</a><br></p>';
			echo "<p id='curr_course_inform'>Викладач, який веде курс : ".$row_teacher_course['name']." ".$row_teacher_course['surname'];echo "<br>";
			echo "Людей зареєстрованих на курсі : ".$data['total']; echo "<br>";
			echo "ID курсу : ".$row_teacher_course['id']; echo "<br>";

			$number_of_rows = mysql_num_rows($query_entered_course);

			if ($number_of_rows >= 1) {
              echo '<button class="enter_course_button" id="enter_course2">
				<a href = "#" id="lol">
					<p id="edit_button_text">Учасник</p></a>
				</button>';
              }
              else
              {
               echo '<button class="enter_course_button" id="enter_course1">
				<a href = "index.php?sidebar=all_global_courses&enter_new_course='.$row_teacher_course['id'].'" id="lol">
					<p id="edit_button_text">Вступити</p></a>
				</button>';
              }
			//echo '<button class="enter_course_button" id="enter_course1">
			//<a href = "index.php?sidebar=all_global_courses&enter_new_course='.$row_teacher_course['id'].'" id="lol">
			//	<p id="edit_button_text">Вступити</p></a>
			//</button>';
			echo '</div>';
		}
	}
	else
	{
		if ($row_inform_user['type'] == 2)
		echo "Викладач не може переглядати інформацію про інші курси. От так от(((";
	}



	?>













	</div>
	
	<?php 
	include 'courses_menu.php';
	?>

	<?php 
	if ($_GET['sidebar'] == "all_global_courses")  
    {
      if ($_GET['enter_new_course']) 
      {
      	$enter_course_user_id = $_SESSION['user_id'];
      	$enter_course_id = $_GET['enter_new_course'];
        $query_insert = mysql_query("INSERT INTO users_course(id_user, id_course) VALUES ('$enter_course_user_id', '$enter_course_id')");
        echo '<script type="text/javascript">
    	window.location = "index.php?sidebar=my_courses"
	    </script>';
      }
    }


	?>

















</div>



</body>
</html>