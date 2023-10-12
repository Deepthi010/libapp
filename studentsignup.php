<?php
  $rollno=$_POST["textrollno"];
  $studentname=$_POST["textsname"];
  $studentphone=$_POST["textsphone"];
  $studentemail=$_POST["textsemail"];
  $studentnew=$_POST["textpassword"];
  $studentconfirm=$_POST["textcpassword"];
  $course=$_POST["textcourse"];
  $semester=$_POST["textsem"];
  $msg=null;
  if($studentnew==$studentconfirm)
  {
  $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  try{
    $stmt=$conn->prepare("insert into student(rollno,studentname,phone,emailid,password,course,semester) values(?,?,?,?,?,?,?)");
    $stmt->bindParam(1,$rollno);
    $stmt->bindParam(2,$studentname);
    $stmt->bindParam(3,$studentphone);
    $stmt->bindParam(4,$studentemail);
    $stmt->bindParam(5,$studentnew);
    $stmt->bindParam(6,$course);
    $stmt->bindParam(7,$semester);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="Signup successful";
        
    }
    else{
            $msg="Failed to signup";
        }
    }catch(Exception $e){
        $msg="Duplicate entry";
    }
    finally{
    $conn=null;
   }
  }
    else{
      $msg="New and confirm passwords do not match";
    }
    
    ?>
    <html>
        <head>
          <title>Student Signin</title>
          <?php
          include("loginlink.php");
          ?>
          <link rel="stylesheet" href="styles.css">
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
    