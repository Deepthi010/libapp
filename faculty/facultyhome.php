<?php
       session_start();
        if(empty($_SESSION))
                 {
                     header('location:../facultysigninform.php');
                 }
?>

<html>
    <head>
        <title>Faculty home</title>
        <?php
          include("headerlink.php");
        ?>
</head>
<body>
    <?php
    include ('facheader.php');
    ?>
    
    <?php
    include ('facfooter.php');
    ?>
 </body>
</html>
     
