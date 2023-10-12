<?php
session_start();

//get input
$email=$_SESSION["email"];
$facultyid=$_SESSION["facultyid"];
$facultyname=$_POST["textfacultyname"];
$phone=$_POST["textphone"];
$msg=null;

try{
    $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $stmt=$conn->prepare("update faculty set  facultyname=?, phone=? where emailid=? and facultyid=?");
    
    $stmt->bindParam(1,$facultyname);
    $stmt->bindParam(2,$phone);
    $stmt->bindParam(3,$email);
    $stmt->bindParam(4,$facultyid);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c==1){
        $msg="Update done";
    }
    else{
        $msg="Update failed";
    }
}  catch(Exception $e){
    $msg=$e->getMessage();
}
    
finally{
    $conn=null;
}

if(empty($_SESSION))
                 {
                     header('location:../facultysigninform.php');
                 }
?>
<html>
    <head>
        <title>Update details</title>
        <?php
          include('headerlink.php');
        ?>
        <link rel="stylesheet" href="styles.css">
</head>
     <body>
     <?php
          include('header.php');
        ?>
          <div class="container">
            
          <div class="item">
             <h4><?php echo $msg;?></h4>
          </div>
          </div> 
          <?php
          include('footer.php');
        ?>
        
     </body>
</html>
