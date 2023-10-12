<?php
    session_start();
        if(empty($_SESSION))
                 {
                     header('location:../studentsigninform.php');
                 }
?>


<html>
    <head>
        <title>Student home</title>
        <?php
          include("headerlink.php");
        ?>
    </head>
<body>
    <?php
    include ('stuheader.php');
    ?>
<?php
          include('stufooter.php');
        ?>
</body>
</html>