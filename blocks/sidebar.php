	<html>
<head>
</head>

<body>

<div class="sidebar">
        
        <div class="gadget">
          <h2 class="star">������� ����</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
          	<li><a href="index.php?sidebar=main_page">������� �������</a></li>
            <li><a href="index.php?sidebar=my_courses">�� �����</a></li>
            <li><a href="index.php?sidebar=journal">������ ������</a></li>
            <li><a href="index.php?sidebar=profile">̳� �������</a></li>
            
          </ul>
        </div>

        <?php
        if ($_SESSION['user_log_in'] == 2)
        {
           echo 
          '<div class="gadget">
            <h2 class="star">���� ���������</h2>
            <div class="clr"></div>
              <ul class="ex_menu">
                  <li><a href="index.php?sidebar=video">�� ����������</a><br />
                    ³��������� ���������</li>
                  <li><a href="index.php?sidebar=write_news">�������� ������</a><br />
                    ���������� ������ �� �����</li>
                  
              </ul>
            </div>
          </div>';
        }
        else
        {
          if ($_SESSION['user_log_in'] == 1)
          {
            echo 
            '<div class="gadget">
              <h2 class="star">���� ��������</h2>
              <div class="clr"></div>
                <ul class="ex_menu">
                  
                  <li><a href="index.php?sidebar=video">�� ����������</a><br />
                    ³��������� ��������</li>
                </ul>
              </div>
            </div>';
          }
          else 
          {
            echo 
            '<div class="gadget">
              <h2 class="star"> </h2>
              <div class="clr"></div>
                
              </div>
            </div>';
          }
        }

        ?>
        


</body>

</html>