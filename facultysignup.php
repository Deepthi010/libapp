<?php
  $facultyid=$_POST["textnumber"];
  $facultyname=$_POST["textname"];
  $facultyphone=$_POST["textphone"];
  $facultyemail=$_POST["textemail"];
  $facultynew=$_POST["textpassword"];
  $facultyconfirm=$_POST["textcpassword"];
  $msg=null;
  $c=0;
  if($facultynew==$facultyconfirm)
  {
  $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  try{
    $stmt=$conn->prepare("insert into faculty(facultyid,facultyname,phone,emailid,password) values(?,?,?,?,?)");
    $stmt->bindParam(1,$facultyid);
    $stmt->bindParam(2,$facultyname);
    $stmt->bindParam(3,$facultyphone);
    $stmt->bindParam(4,$facultyemail);
    $stmt->bindParam(5,$facultynew);
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
        <title>Faculty Signup page</title>
        <?php
          include("loginlink.php");
        ?>
        <link rel="stylesheet" href="styles.css">
    </head>
        
        </head>
        <body>
        
        <?php
          include("header.php");
        ?>
        <div align="center">
    
        <body>
       <div align="center" style="height:300px;">
           <?php
         
            echo $msg;
            echo "<h3><a href=facultysigninform.php>SIGN IN</a></h3>";
          ?>
       </form>
       </div>
           <?php
      
      include("footer.php");
        ?>
       
       </body>
    </html>
    

