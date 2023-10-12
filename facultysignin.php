<?php
 session_start();
// fetch the input
  
  $email=$_POST["textemail"];
  $pwd=$_POST["textpassword"];
  $msg=null;
// open conn
  $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try{
    $stmt=$conn->prepare("select * from faculty where emailid=? and password=?");
    $stmt->bindParam(1,$email);
    $stmt->bindParam(2,$pwd);
    $stmt->execute();
    $c=$stmt->rowCount();
    //if found then goto facultyhome.html else error msg
    if($c==1){
        //fetch rows from database
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $facultyid=$row["facultyid"];
        }
        //store faculty details in session
        $_SESSION["facultyid"]=$facultyid;
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$pwd;
        header('location:faculty/facultyhome.php');
    }
    else{
            $msg="Email Id and passwords don't match";
        }
    }
catch(Exception $e){
        $msg= "Invalid sign in";
    }
    /*finally{
        echo $msg;
    }*/
    ?>
    <html>
        <head>
          <title>Signin</title>
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
          ?>
          <h3>  </br> <a href="facultysigninform.php";>TRY AGAIN</a></h3>
          <?php
          include("footer.php");
          ?>
       </body>
    </html>
