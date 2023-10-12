<?php
session_start();
$filename = "../image/";
$filename=$filename.$_REQUEST["pdffile"];
//header content type
header("Content-type: application/pdf");
header("Content-Length:" .filesize($filename));


if(empty($_SESSION))
    {
      header('location:../adminsigninform.php');
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View PDF </title>
        <?php
          include("headerlink.php");
        ?>
    </head>
    <body>
    <?php
          include("header.php");
        ?>
        <?php
        //send the file to the browser
        readfile($filename);
        ?>
        </body>
        <?php
          include("footer.php");
        ?>
</html>