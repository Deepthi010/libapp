<?php

$to=$_POST["textemailid"];
//from="deepthighantennavar2001@gmail.com";
//$to="abc@gmail.com";
$msg=null;

try{
    $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $stmt=$conn->prepare("select password from student where emailid=?");
 $stmt->bindParam(1,$to);
 $stmt->execute();
 $r=$stmt->rowCount();
 if($r==1)
 {
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $password=$row["password"];
    $subject="Forgot password";
    $message="Your password is $password";
    $header="From:deepthighantennavar2001@gmail.com \r\n";

    $returnval=mail ($to,$subject,$message,$header);

    if($returnval==true){
       $msg="Password sent to your mail.";
    }else{
        $msg="Mail failed";
    }
}
}

catch(Exception $e){
    $msg=$e->getMessage();
}
?>

 <html>
        <head>
          <title>Forgot password</title>
          <?php
          include("loginlink.php");
          ?>
        </head>
       <body>
        <?php
          include("header.php");
          ?>
          <?php 
            echo $msg; 
            echo "<h3><a href=studentsigninform.php>SIGN IN</a></h3>";
          ?>

          <?php
          include("footer.php");
          ?>
       </body>
    </html>
