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
 $returndate=$_POST["textreturndate"];
 $actualreturndate=$_POST["textactualreturndate"];
 $additionalfine=$_POST["textadditionalfine"];
 /*$fine=0;*/
 $returndate=new DateTime($returndate);
 $actualreturndate=new DateTime($actualreturndate);
 $days=$actualreturndate->diff($returndate)->format("%r%a");
 if($days>=1)
 $fine=($days*0.5)+$additionalfine;
 
 $returndate=$returndate->format('Y-m-d');
 $msg=null;
 $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
 try{
    $stmt=$conn->prepare("update booktransactions set returndate=? , fine=? where rollno=? and bookid=? and issuedate=?");
    $stmt->bindParam(1,$returndate);
    $stmt->bindParam(2,$fine);
    $stmt->bindParam(3,$rollno);
    $stmt->bindParam(4,$bookid);
    $stmt->bindParam(5,$issuedate);
    $c=$stmt->execute();
    
     if($c==true)
    {
          if($additionalfine>0){
            
            $status='NA';
        }
        else{
            
            $status='Available';
        }
        $stmtupdate=$conn->prepare("update bookdetails set status=?  where bookid=? and status='NA'");
        $stmtupdate->bindParam(1,$status);
        $stmtupdate->bindParam(2,$bookid);
        $x=$stmtupdate->execute();
       
        if($x){
           
            $msg="Book returned successfully ";
        
        }
        else{
            $msg="Book already returned";
        }
    }
    else{
            $msg="Failed to return book";
        }
    }catch(Exception $e){
        $msg=$e->getMessage();
    }

?>
 
 <html>
     <head>
         <title>Return book info</title>
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
  
 
 
 