<html>
<head>
	<title></title>
</head>
<body>
<script>
function toggle(el) {
       el.style.display = (el.style.display == 'none') ? '' : 'none'
       }
</script>

<?php 
	$charrus=mysql_query("set names 'cp1251'");
	if($_GET['course_id'])
		$current_course = $_GET['course_id']; 
	$query_get_course_name = mysql_query("SELECT name FROM courses WHERE id = '$current_course'");
	$row_course_name = mysql_fetch_array($query_get_course_name);
	$current_course_name = $row_course_name['name'];
?>
<p id="nav_name"><?php echo $current_course_name; ?></p>
<div id="content_writing_style">
	<div id="video_list">
	<?php 
		$user_now = $_SESSION['user_id'];
		$query_user_inform = mysql_query("SELECT * FROM users WHERE id='$user_now'");
		$row_inform_user = mysql_fetch_array($query_user_inform);

		if ($row_inform_user['type'] == 1)
		{
			 
        $query_get_pract_task = mysql_query("SELECT * from pract WHERE id_course = '$current_course'");
        $number_pract_task = mysql_num_rows($query_get_pract_task);
        if ($number_pract_task>=1)
          echo '<p id="ttt">������ ���������� ������� : <br></p>';
        while ($row_pract_task = mysql_fetch_array($query_get_pract_task))
        {
          echo '<div id="curr_pract_output">';  echo '<font id="qaza">';
          $some_var = $row_pract_task['id'];
            echo '<a href="index.php?sidebar=current_pract&id_pract='.$some_var.'">';
            echo $row_pract_task['name']; echo "</a><br>"; echo '</font>';
            echo '<font id="qaze">';
            echo "���� �������� : "; echo '</font>'; echo '<font id="qaz">'; echo $row_pract_task['description']; echo '</font>'; echo "<br>";
            echo '</p>'; echo '<font id="qaze">';
            echo "����������� ������ : "; echo '</font>'; echo '<font id="qaz">'; echo $row_pract_task['max_mark'];  echo '</font>'; echo "<br>";
            echo '<font id="qaze">';
            echo "���� ����� : "; echo '</font>'; echo '<font id="qaz">'; echo $row_pract_task['date'];  echo '</font>'; echo "<br>";
            echo '</div>';
            
        }
       
        $query_get_laba_task = mysql_query("SELECT * from laba WHERE id_course = '$current_course'");
        $number_laba_task = mysql_num_rows($query_get_laba_task);
        if ($number_laba_task>=1)
           echo '<p id="ttt">������ ������������ ������� : <br></p>';
         if ($number_laba_task <=0 and $number_pract_task <=0)
          echo "����� �� ������ ����, ���� ����� �������.";
        while ($row_laba_task = mysql_fetch_array($query_get_laba_task))
        {
          echo '<div id="curr_pract_output">';  echo '<font id="qaza">';
          $some_var = $row_laba_task['id'];
             echo '<a href="index.php?sidebar=current_laba&id_laba='.$some_var.'">';
            echo $row_laba_task['name']; echo "</a><br>"; echo '</font>';
            echo '<font id="qaze">';
            echo "���� �������� : "; echo '</font>'; echo '<font id="qaz">'; echo $row_laba_task['description']; echo '</font>'; echo "<br>";
            echo '</p>'; echo '<font id="qaze">';
            echo "����������� ������ : "; echo '</font>'; echo '<font id="qaz">'; echo $row_laba_task['max_mark'];  echo '</font>'; echo "<br>";
            echo '<font id="qaze">';
            echo "���� ����� : "; echo '</font>'; echo '<font id="qaz">'; echo $row_laba_task['date'];  echo '</font>'; echo "<br>";
            if ($row_laba_task['laba'])
            {
              echo '<font id="qaze">';
              $name_file2 = $row_laba_task['laba'];

              echo "����������� ���� : "; echo '</font>'; echo '<font id="qaz">'; 
              echo '<a href="/documents/teacher_labs/'.$name_file2.'"'.$row_laba_task['laba'].'</a>';
              //echo '<a href="Z:/home/localhost/www/documents/teacher_labs/'.$name_file2.'">';
              echo $row_laba_task['laba'];echo '</a>';  echo '</font>'; echo "<br>";
            }
            echo '</div>';
            

        }
		}
		else 
		{
			if ($row_inform_user['type'] == 2)
			{
				echo '<p id="ttt">������ ���������� ������� : <br></p>';
				$query_get_pract_task = mysql_query("SELECT * from pract WHERE id_course = '$current_course'");
				while ($row_pract_task = mysql_fetch_array($query_get_pract_task))
        {
          $some_var = $row_pract_task['id'];
        	echo '<div id="curr_pract_output">';  echo '<font id="qaza">';
          echo '<a href="index.php?sidebar=assess_student&id_pract='.$some_var.'&id_course='.$current_course.'">';
            echo $row_pract_task['name']; echo "</a><br>"; echo '</font>';
            echo '<font id="qaze">';
            echo "���� �������� : "; echo '</font>'; echo '<font id="qaz">'; echo $row_pract_task['description']; echo '</font>'; echo "<br>";
            echo '</p>'; echo '<font id="qaze">';
            echo "����������� ������ : "; echo '</font>'; echo '<font id="qaz">'; echo $row_pract_task['max_mark'];  echo '</font>'; echo "<br>";
            echo '<font id="qaze">';
            echo "���� ����� : "; echo '</font>'; echo '<font id="qaz">'; echo $row_pract_task['date'];  echo '</font>'; echo "<br>";
            echo '</div>';
            
        }



        echo '<p id="ttt">������ ������������ ������� : <br></p>';
        $query_get_laba_task = mysql_query("SELECT * from laba WHERE id_course = '$current_course'");
        while ($row_laba_task = mysql_fetch_array($query_get_laba_task))
        {
          $some_var = $row_laba_task['id'];
          echo '<div id="curr_pract_output">';  echo '<font id="qaza">';
          echo '<a href="index.php?sidebar=assess_student&id_laba='.$some_var.'&id_course='.$current_course.'">';
            echo $row_laba_task['name'];  echo "</a><br>"; echo '</font>';
            echo '<font id="qaze">';
            echo "���� �������� : "; echo '</font>'; echo '<font id="qaz">'; echo $row_laba_task['description']; echo '</font>'; echo "<br>";
            echo '</p>'; echo '<font id="qaze">';
            echo "����������� ������ : "; echo '</font>'; echo '<font id="qaz">'; echo $row_laba_task['max_mark'];  echo '</font>'; echo "<br>";
            echo '<font id="qaze">';
            echo "���� ����� : "; echo '</font>'; echo '<font id="qaz">'; echo $row_laba_task['date'];  echo '</font>'; echo "<br>";
            if ($row_laba_task['laba'])
            {
              echo '<font id="qaze">';
              $name_file2 = $row_laba_task['laba'];

              echo "����������� ���� : "; echo '</font>'; echo '<font id="qaz">'; 
              echo '<a href="/documents/teacher_labs/'.$name_file2.'"'.$row_laba_task['laba'].'</a>';
              //echo '<a href="Z:/home/localhost/www/documents/teacher_labs/'.$name_file2.'">';
              echo $row_laba_task['laba'];echo '</a>';  echo '</font>'; echo "<br>";
            }
            echo '</div>';
            

        }
			}
			
		}
		
	?>
	</div>




	<?php 
	if ($row_inform_user['type'] == 2)
	{

	?>
	<div id="video_menu">
		<div class="gadget"> 
      <div class="clr"></div>
        <ul class="ex_menu">
        	<p id="title_video">��������� ������</p>
          <li><a onclick="toggle(hidden_content1)" id="just_pointer">������� ��������</a><br />
            ��������� ��������� ������ �� ����� ��������</li>
             <div id="hidden_content1" style="display: none;">��� ����, ��� ������� �������� ������ ������� �� ��������� ������ ��� �����������, � ���� ������� ��������, ����� �� ����� � �������. </div>
          




      		<p id="title_video">����������� �����</p>
      	  
          <!---             ����� ���� 2  -->
          <?php 
          	if($_GET['course_id'])
			$current_add_task = $_GET['course_id']; 
			echo '<li><a href="index.php?sidebar=add_course_task&id_course='.$current_add_task.'" id="just_pointer">�������� ���� ��������</a><br />';
          ?>
          
            ��������� ������ ���� ��������</li>
            <div id="hidden_content2" style="display: none;">
              <form method="post">
                <p id="text_video_menu">������ ����� ���������� :<br></p>
                <input type="text" class="video_search" name="video_name_2" value = "" ><br><br>
                <p id="text_video_menu">������ ��������� YouTube :<br></p>
                <input type="text" class="video_search" name="youtube_link_2" value = "" ><br>                      
                <input type="submit" value="������" name="submit2" id="submit_button2">
              </form>
            </div>
            <li><a onclick="toggle(hidden_content2)" id="just_pointer">�������� ��� ��������</a><br />
            ��������� ������ ����� ������� �� �����</li>
            <div id="hidden_content2" style="display: none;">
              <form method="post">
                <p id="text_video_menu">������ ����� ���������� :<br></p>
                <input type="text" class="video_search" name="video_name_2" value = "" ><br><br>
                <p id="text_video_menu">������ ��������� YouTube :<br></p>
                <input type="text" class="video_search" name="youtube_link_2" value = "" ><br>                      
                <input type="submit" value="������" name="submit2" id="submit_button2">
              </form>
            </div>
          <li><a onclick="toggle(hidden_content3)" id="just_pointer">�������� ��������</a><br />
            �������� ��������� ������� ��������</li>
            <div id="hidden_content3" style="display: none;">
              <form method="post">
                <p id="text_video_menu">������ ����� �������� :<br></p>
                <input type="text" class="video_search" name="task_name_2" value = "" ><br><br>
                <p id="text_video_menu">������ ��� login :<br></p>
                <input type="text" class="video_search" name="task_login_2" value = "" ><br>                      
                <input type="submit" value="��������" name="task_delete_2" id="submit_button2">
              </form>
              
            </div>
            
      </ul>
    </div>
  </div>
  <?php 
	}
  ?>

</div>


<?php 
if ($_POST['task_delete_2'])
{
    $user_in = $_SESSION['user_id'];
   $query_get_user_login = mysql_query("SELECT login from users WHERE id='$user_in'");
   $row_user_login = mysql_fetch_array($query_get_user_login);
   
   if ($row_user_login['login'] == $_POST['task_login_2'])
   {
      $del_element = $_POST['task_name_2'];
      echo $del_element;
      $query_delete_pract = mysql_query("DELETE  FROM pract WHERE name='$del_element'"); echo "";
      $query_delete_task_2 = mysql_query("DELETE  FROM laba WHERE name='$del_element'");
      $ccc_id = $_GET['course_id'];
      echo '<script type="text/javascript">
           window.location = "index.php?sidebar=current_course&course_id='.$ccc_id.'"
        </script>';
   }
}
?>








</body>
</html>