<html>
<head>
	<title></title>
</head>
<body>
<?php 

	$charrus=mysql_query("set names 'cp1251'");
	$user_now = $_SESSION['user_id'];
	$query_user_inform = mysql_query("SELECT * FROM users WHERE id='$user_now'");
	$row_inform_user = mysql_fetch_array($query_user_inform);
?>
	<div id="courses_menu">
		<div class="gadget"> 
      <div class="clr"></div>
        <ul class="ex_menu">
        	<?php 

        		if ($row_inform_user['type'] == 2) 
				{
					
        	?>
      		<p id="title_video">�����</p>
      	  
          <!---             ����� ���� 2  -->
          <li><a onclick="toggle(hidden_content2)" id="just_pointer">����� ����</a><br />
            ��������� ������ �����</li>
            <div id="hidden_content2" style="display: none;">
              <form method="post">
                <p id="text_video_menu">������ ����� ������ ����� :<br></p>
                <input type="text" class="video_search" name="new_course_name" value = "" ><br>
                <input type="submit" value="��������" name="submit_new_course" id="submit_button2">
              </form>
            </div>
          <li><a onclick="toggle(hidden_content3)" id="just_pointer">�������� ����</a><br />
            ��������� ��������� �����</li>
            <div id="hidden_content3" style="display: none;">
            	<form method="post">
                <p id="text_video_menu">������ ����� ����� :<br></p>
                <input type="text" class="video_search" name="delete_course_name" value = "" ><br>
                <p id="text_video_menu">������ ID ����� :<br></p>
                <input type="text" class="video_search" name="delete_course_id" value = "" ><br>
                <input type="submit" value="��������" name="delete_some_course" id="submit_button2">
              </form>
            </div>
          <li><a onclick="toggle(hidden_content1)" id="just_pointer">����������� �����</a><br />
            ���� ����� ����� ��� ���� ���������.</li>
             <div id="hidden_content1" style="display: none;">����-�� ����������</div>
          <form method="post">
          <li><a href="index.php?sidebar=all_global_courses">�� �����</a><br />
            �� ������� ����� �� PGVsite</li>
            
          </form>
      </ul>
      <?php } 
      else if ($row_inform_user['type'] == 1)
      {
      ?>
      <p id="title_video">�����</p>
      	  
          <!---             ����� ���� 2  -->
          <li><a onclick="toggle(hidden_content2)" id="just_pointer">�������� �� �����</a><br />
            ����� ��������� ������ ����������� �����</li>
            <div id="hidden_content2" style="display: none;">
             ��� ����, ��� �������� �� �����, �������� � ������� "�� �����", ��� ���� ��������� ����� ��������� �����.
            </div>
          
          <li><a href="#">�� �����</a><br />
            �� ������� ����� �� PGVsite</li>






      <?php } ?>

    </div>
  </div>

</div>














</body>
</html>