<?php
session_start();
 if(empty($_SESSION))
 {
     header('location:../adminsigninform.php');
 }
 ?>

<?php
 $rollno=$_POST["textrollno"];
 $bookid=$_POST["textbookid"];
 $issuedate=$_POST["textissuedate"];
 $actualreturndate=$_POST["textactualreturndate"];
 $msg=null;
 $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
 try{
    $stmt=$conn->prepare("insert into booktransactions(rollno,bookid,issuedate,actualreturndate) values(?,?,?,?)");
    $stmt->bindParam(1,$rollno);
    $stmt->bindParam(2,$bookid);
    $stmt->bindParam(3,$issuedate);
    $stmt->bindParam(4,$actualreturndate);
    $stmt->execute();
    $c=$stmt->rowCount();
       if($c>0){
        $stmtupdate=$conn->prepare("update bookdetails set status='NA' where bookid=?");
        $stmtupdate->bindParam(1,$bookid);
        $stmtupdate->execute();
        $x=$stmtupdate->rowCount();
        if($x>0){
            $stmtup=$conn->prepare("delete from bookreserve where status='reserved' and rollno=? and bookid=?");
            $stmtup->bindParam(1,$rollno);
            $stmtup->bindParam(2,$bookid);
            $y=$stmtup->execute();
            if($y)
            $msg="Book issued successfully ";
        
           else
            $msg="Book not issued";
            
    }
    else{
            $msg="Book already issued";
        }
       }
    else{
            $msg="Failed to issue book";
        }
    }catch(Exception $e){
        $msg=$e->getMessage();
    }


    
?>
 

 <html>
     <head>
         <title>Issue book info</title>
         <link rel="stylesheet" href="styles.css">
         <?php
           include ('headerlink.php');
         ?> 
     </head>
  <body>
     <?php
        include('header.php');
     ?>
     <div class="container">
         
         <div class="item">
             <h4><?php echo $msg; ?></h4>
         </div>
     </div>
     <?php
         include('footer.php');
     ?>
   </body>
</html>
 
 
 
 