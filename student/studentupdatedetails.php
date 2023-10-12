<?php
session_start();
if(empty($_SESSION))
                 {
                     header('location:../studentsigninform.php');
                 }
//get input
$email=$_SESSION["email"];
$studentname=$_POST["textstudentname"];
$phone=$_POST["textphone"];
$semester=$_POST["textsemester"];
$msg=null;

try{
    $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $stmt=$conn->prepare("update student set studentname=?, phone=?, semester=? where emailid=? ");
    
    $stmt->bindParam(1,$studentname);
    $stmt->bindParam(2,$phone);
    $stmt->bindParam(3,$semester);
    $stmt->bindParam(4,$email);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c==1){
        $msg="Update done";
    }
    else{
        $msg="Update failed";
    }
}  
catch(Exception $e){
    $msg="Update failed";
}
    
finally{
    $conn=null;
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
            <h4> <?php echo $msg;?></h4>
          </div>
          </div> 
          <?php
          include('footer.php');
        ?>
</body>
</html>
