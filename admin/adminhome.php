<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
    ?>



<html>
    <head>
        <title>Admin home</title>
        <?php
          include ('headerlink.php');
        ?>
    </head>
 <body>
    <?php
    include ('adminheader.php');
    ?>
   <?php
    include ('adminfooter.php');
    ?>
</body>
</html>
     
