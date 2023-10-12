<html>
    <head>
        <title>Faculty home</title>
        <?php
          include("links.php");
        ?>
        <body>

        </body>
</head>
</html>
 <?php
 session_start();
 session_destroy();
 header("location:../index.php");
 ?>