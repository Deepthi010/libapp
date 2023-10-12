<?php
  //session start
  session_start();
  //get i/p
  $currentpwd=$_POST["textcurrentpassword"];
  $newpwd=$_POST["textnewpassword"];
  $confirmpwd=$_POST["textconfirmpassword"];
  $msg=null;
  //compare session and current pwd
  if($currentpwd==$_SESSION["password"]){
      if($newpwd==$confirmpwd)
      {
          //update database password
          try{
            $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $stmt=$conn->prepare("update admin set password=? where emailid=?");
            $stmt->bindParam(1,$newpwd);
            $stmt->bindParam(2,$_SESSION["email"]);
            $stmt->execute();
            $c=$stmt->rowCount();
        if($c==1){
            //update session pwd
             $_SESSION["password"]=$newpwd;
             $msg="Password changed successfully";
        }else{
            $msg="Password change failed";
        }
    }
          catch(Exception $e)
          {
              $msg="Password update failed ,".$e->getMessage();
              
          }
          finally{
              $conn=null;
          }
      }
      else{
          $msg="new and confirm pwd do not match ";
      }
  }
  else{
      $msg="current password is invalid";
  }
  
           
           if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
             ?>

  <html>
  <head>
        <title>Admin Change password</title>
        <?php
          include("headerlink.php");
        ?>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
        include('header.php');
        ?>
        <div class="container">
           
       <div class="item">
           <?php echo $msg;?>
       </div>
        </div>
        <?php
        include('footer.php');
        ?>
            </body>
</html>
   